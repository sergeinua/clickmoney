<?php

namespace app\controllers;

use app\models\Subscriber;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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
        return $this->render('index', [
            'model' => new Subscriber(),
            'esp_forms' => Yii::$app->params['esp_forms'],
            'esp_forms_exit' => Yii::$app->params['esp_forms_exit']
        ]);
    }

    /**
     * Validates name & email for the autoresponder forms
     *
     * @return string
     */
    public function actionValidate()
    {
        return $this->renderFile('@app/views/site/validate.php', [
            'esp_forms' => Yii::$app->params['esp_forms'],
            'esp_forms_exit' => Yii::$app->params['esp_forms_exit']
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
     * ClickTrough page
     * @return string
     */
    public function actionClickThrough()
    {
        return $this->render('click_through');
    }

    /**
     * Members page
     * @return string
     */
    public function actionMembers()
    {
        return $this->render('members', [
            'email' => Yii::$app->session->get('email'),
            'fname' => Yii::$app->session->get('fname')
        ]);
    }

    /**
     * @return string
     */
    public function actionFreereport()
    {
        return $this->render('freereport');
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
     * Testing page for modal
     * @return string
     */
    public function actionThank()
    {
        return $this->render('thank_you');
    }
}
