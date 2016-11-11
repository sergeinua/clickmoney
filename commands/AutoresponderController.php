<?php

namespace app\commands;

use yii\console\Controller;
use app\models\SubscriberApi;
use app\models\Apis;
use app\models\Subscriber;
use app\helpers\YmlpApi;
use app\helpers\MainAweberApi;
use Yii;
use app\models\AweberExistingSubscribers;
use app\helpers\GetResponseApi;

class AutoresponderController extends Controller
{
    /**
     * Adds new SubscriberApi models and calls check
     */
    public function actionIndex()
    {
        /* getting models that weren't processed before */
        $models = (new \yii\db\Query())
            ->select(['cm_all_adds.id', 'cm_all_adds.info_user'])
            ->from('cm_all_adds')
            ->leftJoin('subscriber_api', 'cm_all_adds.id=subscriber_api.subscriber_id')
            ->where('subscriber_api.id is null')
            ->orderBy('cm_all_adds.created_at asc')
            ->all();
        /* setting models to be sent */
        foreach ($models as $model) {
            (new SubscriberApi([
                'subscriber_id' => $model['id'],
                'api_id' => Apis::find()->where(['name' => 'aweber'])->one()['id'],
                'added_at' => time(),
                'status' => 0
            ]))->save();
            (new SubscriberApi([
                'subscriber_id' => $model['id'],
                'api_id' => Apis::find()->where(['name' => 'ymlp'])->one()['id'],
                'added_at' => time(),
                'status' => 0
            ]))->save();
            /* for now getresponse is not un use
            (new SubscriberApi([
                'subscriber_id' => $model['id'],
                'api_id' => Apis::find()->where(['name' => 'getresponse'])->one()['id'],
                'added_at' => time(),
                'status' => 0
            ]))->save();
            */
        }

        /* updating aweber subscribers if needed */
        $this->updateAweberSubscribers();

        /* getresponse api
        $this->processGetresponse();*/

        $this->processYmlp();

        $this->processAweber();
    }

    /**
     * Updates table of the aweber's account subscribers
     *
     */
    public function updateAweberSubscribers()
    {
        $consumerKey = Yii::$app->params['aweber_consumer_key'];
        $consumerSecret = Yii::$app->params['aweber_consumer_secret'];
        $accessToken = Yii::$app->params['aweber_access_token'];
        $accessTokenSecret = Yii::$app->params['aweber_access_token_secret'];
        $list_id = Yii::$app->params['aweber_list_id'];

        $aweber_last_updated_at = AweberExistingSubscribers::find()
            ->where(['list_id' => $list_id])
            ->orderBy('updated_at asc')
            ->one()['updated_at'];

        if (strtotime('+1 day', $aweber_last_updated_at) < time()){
            /* updating data */
            $aweber = new MainAweberApi($consumerKey, $consumerSecret);
            $account_id = $aweber->getAccount($accessToken, $accessTokenSecret);
            /* all the emails of the defined list */
            $existing_subscribers = $aweber->getAllSubscribers($accessToken, $accessTokenSecret, $account_id, $list_id);
            if (count($existing_subscribers) > 0) {
                AweberExistingSubscribers::deleteAll();
                $time = time();
                foreach ($existing_subscribers as $item) {
                    if (! $this->checkIfMissingDb($item['email'])) {
                        /* adding to db */
                        $subscriber = new Subscriber();
                        $subscriber->info_user = $item['email'];
                        $subscriber->page_type = 'AweberApi';
                        $subscriber->ip = is_null($item['ip_address']) ? '127.0.0.1' : $item['ip_address'];
                        $subscriber->created_at = date('Y-m-d H:i:s', $time);
                        $subscriber->save(false);
                        /* adding with status 1 - for not taking this record in further requests */
                        (new SubscriberApi([
                            'subscriber_id' => $subscriber->id,
                            'api_id' => Apis::find()->where(['name' => 'aweber'])->one()['id'],
                            'added_at' => time(),
                            'status' => 1
                        ]))->save();
                    }
                    (new AweberExistingSubscribers([
                        'list_id' => $list_id,
                        'email' => $item['email'],
                        'status' => $item['status'],
                        'updated_at' => $time
                    ]))->save();
                }
            }
        }
    }

    /**
     * Checks if the distinct subscriber already exists in db
     * It's for Aweber list for now only
     *
     * @param $email
     * @return bool
     */
    public function checkIfMissingDb($email)
    {
        return Subscriber::find()
            ->where(['info_user' => $email])
            ->exists();
    }

    /**
     * Getresponse api
     */
    public function processGetresponse()
    {
        /* getresponse models to be sent */
        $getresponce_models = SubscriberApi::find()
            ->where(['api_id' => Apis::find()->where(['name' => 'getresponse'])->one()['id']])
            ->andWhere(['status' => 0])
            ->all();
        /* getresponse api */
        $getresponse = new GetResponseApi(Yii::$app->params['getresponse_key']);

        foreach ($getresponce_models as $model) {
            $email = Subscriber::find()->where(['id' => $model['subscriber_id']])->one()['info_user'];
            $getresponce_exists = false;
            $getresponce_added = false;
            /* checking if the subscriber is already in the defined list */
            $subscriber_data = $getresponse->getContacts([
                'query' => ['email' => $email],
                'fields' => 'email'
            ]);
            foreach ($subscriber_data as $item) {
                $getresponce_exists = true;
            }
            if (! $getresponce_exists) {
                $getresponse->addContact([
                    'email' => $email,
                    'campaign' => ['campaignId' => Yii::$app->params['getresponse_campaign_id']]
                ]);
                $getresponce_added = true;
            }
            if ($getresponce_added) {
                $api_model = SubscriberApi::find()->where(['id' => $model['id']])->one();
                $api_model->added_at = time();
                $api_model->status = 1;
                $api_model->save();
            }
        }
    }

    /**
     * Adding subscribers via Aweber api
     */
    public function processAweber()
    {
        /* aweber models to be sent */
        $aweber_models = SubscriberApi::find()
            ->where(['api_id' => Apis::find()->where(['name' => 'aweber'])->one()['id']])
            ->andWhere(['status' => 0])
            ->limit(25)
            ->all();
        /* aweber api */
        if (count($aweber_models) > 0) {
            $consumerKey = Yii::$app->params['aweber_consumer_key'];
            $consumerSecret = Yii::$app->params['aweber_consumer_secret'];
            $accessToken = Yii::$app->params['aweber_access_token'];
            $accessTokenSecret = Yii::$app->params['aweber_access_token_secret'];
            $list_id = Yii::$app->params['aweber_list_id'];
            $aweber = new MainAweberApi($consumerKey, $consumerSecret);
            $account_id = $aweber->getAccount($accessToken, $accessTokenSecret);
            /* checking for existing subscriber in the local copy of the aweber subscribers */
            foreach ($aweber_models as $model) {
                $email = Subscriber::find()->where(['id' => $model['subscriber_id']])->one()['info_user'];
                $aweber_email_exists = false;
                $aweber_added = false;
                /* checking if email exists */
                $aweber_email_exists = AweberExistingSubscribers::find()->where(['email' => $email])->exists();
                if (! $aweber_email_exists) {
                    $subscriber_added = $aweber->addSubscriber($accessToken, $accessTokenSecret, $account_id, $list_id, ['email' => $email]);
                    if ($subscriber_added) {
                        $aweber_added = true;
                    }
                }
                if ($aweber_added) {
                    $api_model = SubscriberApi::find()->where(['id' => $model['id']])->one();
                    $api_model->added_at = time();
                    $api_model->status = 1;
                    $api_model->save();
                }
            }
        }
    }

    /**
     * Adding subscribers via YMLP api
     */
    public function processYmlp()
    {
        /* ymlp models to be sent */
        $ymlp_models = SubscriberApi::find()
            ->where(['api_id' => Apis::find()->where(['name' => 'ymlp'])->one()['id']])
            ->andWhere(['status' => 0])
            ->all();
        /* ymlp api */
        $ymlp_api_key = Yii::$app->params['ymlp_api_key'];
        $ymlp_api_username = Yii::$app->params['ymlp_api_username'];
        $ymlp = new YmlpApi($ymlp_api_key, $ymlp_api_username);

        foreach ($ymlp_models as $model) {
            $email = Subscriber::find()->where(['id' => $model['subscriber_id']])->one()['info_user'];
            $ymlp_email_exists = false;
            $ymlp_added = false;
            /* checking if email exists */
            if (isset($ymlp->ContactsGetContact($email)['EMAIL'])) {
                $ymlp_email_exists = true;
            } else {
                /* creating new subscriber */
                $ymlp->ContactsAdd($Email = $email, $OtherFields = '', $GroupID = '1', $OverruleUnsubscribedBounced = '1');
                $ymlp_added = true;
            }
            if ($ymlp_added) {
                $api_model = SubscriberApi::find()->where(['id' => $model['id']])->one();
                $api_model->added_at = time();
                $api_model->status = 1;
                $api_model->save();
            }
        }
    }
}