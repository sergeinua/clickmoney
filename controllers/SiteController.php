<?php

namespace app\controllers;

use app\controllers\YMLP_API;
use app\models\Subscriber;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use AWeberAPI;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $forms[] = ['forms' => Yii::$app->params['esp_forms']];
        $forms[] = ['prefix' => 'overlay', 'forms' => Yii::$app->params['esp_forms_overlay']];
        return $this->render('index', [
            'model' => new Subscriber(),
            'forms' => $forms
        ]);
    }

    /**
     * Validates name & email for the autoresponder forms
     *
     * @return string
     */
    public function actionValidate($form)
    {
        if ($form == 'index' || $form == 'main'|| $form == 'main2') {
            $forms[] = ['forms' => Yii::$app->params['esp_forms']];
            $forms[] = ['prefix' => 'overlay', 'forms' => Yii::$app->params['esp_forms_overlay']];
        } else if ($form == 'freereport') {
            $forms[] = ['prefix' => 'exit', 'forms' => Yii::$app->params['esp_forms_exit']];
        }

        return $this->renderFile('@app/views/site/validate.php', [
            'forms' => $forms
        ]);
    }

    public function actionImage($email, $t, $name)
    {
        $model = new Subscriber();
        $model->info_user = $email;
        $model->page_type = $t;
        $model->ip = $_SERVER['REMOTE_ADDR'];
        $model->created_at = date("Y-m-d G:i:s");
        $model->save(false);

//        /* ymlp api */
//        $ymlp_api_key = Yii::$app->params['ymlp_api_key'];
//        $ymlp_api_username = Yii::$app->params['ymlp_api_username'];
//        $ymlp = new YMLP_API($ymlp_api_key, $ymlp_api_username);
//        $ymlp->ContactsAdd($Email = $email, $OtherFields = '', $GroupID = '1', $OverruleUnsubscribedBounced = '1');
//
//        /* aweber api */
//        require_once('aweber_api/aweber_api.php');
//        $consumerKey = Yii::$app->params['aweber_consumer_key'];
//        $consumerSecret = Yii::$app->params['aweber_consumer_secret'];
//        $account_id = Yii::$app->params['aweber_account_id'];
//        $list_id = Yii::$app->params['aweber_list_id'];
//        $aweber = new AWeberAPI($consumerKey, $consumerSecret);
//        if (empty($_COOKIE['accessToken'])) {
//            if (empty($_GET['oauth_token'])) {
//                $callbackUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//                list($requestToken, $requestTokenSecret) = $aweber->getRequestToken($callbackUrl);
//                setcookie('requestTokenSecret', $requestTokenSecret);
//                setcookie('callbackUrl', $callbackUrl);
//                header("Location: {$aweber->getAuthorizeUrl()}");
//                exit();
//            }
//            $aweber->user->tokenSecret = $_COOKIE['requestTokenSecret'];
//            $aweber->user->requestToken = $_GET['oauth_token'];
//            $aweber->user->verifier = $_GET['oauth_verifier'];
//            list($accessToken, $accessTokenSecret) = $aweber->getAccessToken();
//            setcookie('accessToken', $accessToken);
//            setcookie('accessTokenSecret', $accessTokenSecret);
//            header('Location: '.$_COOKIE['callbackUrl']);
//            exit();
//        }
//        $aweber->adapter->debug = false;
//        $account = $aweber->getAccount($_COOKIE['accessToken'], $_COOKIE['accessTokenSecret']);
//        try {
//            $list = $account->lists[0];
//            $params = array(
//                'email' => $email,
//                'name' => $name,
//            );
//            $subscribers = $list->subscribers;
//            $new_subscriber = $subscribers->create($params);
//        } catch(AWeberAPIException $exc) {
//            print "<h3>AWeberAPIException:</h3>";
//            print " <li> Type: $exc->type              <br>";
//            print " <li> Docs: $exc->documentation_url <br>";
//            print "<hr>";
//        }

        Yii::$app->session->set('email', $email);
        Yii::$app->session->set('fname', $name);

        return readfile(Yii::$app->basePath . "/web/images/pixel.gif");
    }

    public function actionCheck($email)
    {
        $model = new Subscriber();
        $model->info_user = $email;
        $model->page_type = 'check';
        $model->ip = $_SERVER['REMOTE_ADDR'];
        $model->created_at = date("Y-m-d G:i:s");
        $model->save();
    }

    /**
     * Accessapproved page
     * @return string
     */
    public function actionAccessapproved()
    {
        return $this->render('accessapproved');
    }

    /**
     * Members page
     * @return string
     */
    public function actionApproved()
    {
        return $this->render('approved', [
            'email' => Yii::$app->session->get('email'),
            'fname' => Yii::$app->session->get('fname')
        ]);
    }

    /**
     * @return string
     */
    public function actionFreereport()
    {
        $forms[] = ['prefix' => 'exit', 'forms' => Yii::$app->params['esp_forms_exit']];
        return $this->render('freereport', [
            'forms' => $forms
        ]);
    }

    /**
     * @return string
     */
    public function actionExitsplash()
    {
        return $this->renderFile('@app/views/site/exitsplash.php');
    }

    /**
     * Disclaimer page
     * @return string
     */
    public function actionDisclaimer()
    {
        return $this->render('disclaimer');
    }

    /**
     * Privacy Policy page
     * @return string
     */
    public function actionPrivacyPolicy()
    {
        return $this->render('privacy_policy');
    }

    /**
     * Terms page
     * @return string
     */
    public function actionTerms()
    {
        return $this->render('terms');
    }

    /**
     * Earnings Disclaimer page
     * @return string
     */
    public function actionEarningsDisclaimer()
    {
        return $this->render('earnings_disclaimer');
    }

    /**
     * Spam Policy page
     * @return string
     */
    public function actionSpamPolicy()
    {
        return $this->render('spam_policy');
    }

    /**
     * Support page
     * @return string
     */
    public function actionSupport()
    {
        return $this->render('support');
    }

    /**
     * Exit page for the members page
     * @return string
     */
    public function actionLaststep()
    {
        return $this->render('laststep', [
            'email' => Yii::$app->session->get('email'),
            'fname' => Yii::$app->session->get('fname')
        ]);
    }

    /**
     * FE2 page
     * @return string
     */
    public function actionMain()
    {
        $forms[] = ['forms' => Yii::$app->params['esp_forms']];
        $forms[] = ['prefix' => 'overlay', 'forms' => Yii::$app->params['esp_forms_overlay']];

        return $this->render('main', [
            'forms' => $forms
        ]);
    }

    /**
     * Members 3 page
     * @return string
     */
    public function actionFinaloffer()
    {
        return $this->render('finaloffer', [
            'email' => Yii::$app->session->get('email'),
            'fname' => Yii::$app->session->get('fname')
        ]);
    }

    public function actionMain2()
    {
        $forms[] = ['forms' => Yii::$app->params['esp_forms']];
        $forms[] = ['prefix' => 'overlay', 'forms' => Yii::$app->params['esp_forms_overlay']];

        return $this->render('main2', [
            'forms' => $forms
        ]);
    }
}
