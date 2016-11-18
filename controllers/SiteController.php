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
            'forms' => $forms,
            'exitSplAndPopup' => true
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

    /**
     * Saves subscriber to the db
     *
     * @param $email
     * @param $t
     * @param $name
     * @return int
     */
    public function actionImage($email, $t, $name)
    {
        $model = new Subscriber();
        $model->info_user = $email;
        $model->page_type = $t;
        $model->ip = $_SERVER['REMOTE_ADDR'];
        $model->created_at = date("Y-m-d G:i:s");
        $model->save();

        Yii::$app->session->set('email', $email);
        Yii::$app->session->set('fname', $name);

        return readfile(Yii::$app->basePath . "/web/images/pixel.gif");
    }

    /**
     * Accessapproved page
     *
     * @return string
     */
    public function actionAccessapproved()
    {
        return $this->render('accessapproved', [
            'exitSplAndPopup' => true
        ]);
    }

    /**
     * Members page
     *
     * @return string
     */
    public function actionApproved()
    {
        $gi = '4850';
        $gi_mobile = '4851';

        return $this->render('approved', [
            'email' => Yii::$app->session->get('email'),
            'fname' => Yii::$app->session->get('fname'),
            'exitSplAndPopup' => true,
            'gi' => $gi,
            'gi_mobile' => $gi_mobile
        ]);
    }

    /**
     * Exit page for the FE
     *
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
     * Renders exitsplash script
     *
     * @return string
     */
    public function actionExitsplash()
    {
        return $this->renderFile('@app/views/site/exitsplash.php');
    }

    /**
     * Disclaimer page
     *
     * @return string
     */
    public function actionDisclaimer()
    {
        return $this->render('disclaimer');
    }

    /**
     * Privacy Policy page
     *
     * @return string
     */
    public function actionPrivacyPolicy()
    {
        return $this->render('privacy_policy');
    }

    /**
     * Terms page
     *
     * @return string
     */
    public function actionTerms()
    {
        return $this->render('terms');
    }

    /**
     * Earnings Disclaimer page
     *
     * @return string
     */
    public function actionEarningsDisclaimer()
    {
        return $this->render('earnings_disclaimer');
    }

    /**
     * Spam Policy page
     *
     * @return string
     */
    public function actionSpamPolicy()
    {
        return $this->render('spam_policy');
    }

    /**
     * Support page
     *
     * @return string
     */
    public function actionSupport()
    {
        return $this->render('support');
    }

    /**
     * Laststep page - exit page for the members page
     *
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
     *
     * @return string
     */
    public function actionMain()
    {
        $forms[] = ['forms' => Yii::$app->params['esp_forms']];
        $forms[] = ['prefix' => 'overlay', 'forms' => Yii::$app->params['esp_forms_overlay']];

        return $this->render('main', [
            'forms' => $forms,
            'exitSplAndPopup' => true
        ]);
    }

    /**
     * Members 3 page
     *
     * @return string
     */
    public function actionFinaloffer()
    {
        return $this->render('finaloffer', [
            'email' => Yii::$app->session->get('email'),
            'fname' => Yii::$app->session->get('fname')
        ]);
    }

    /**
     * FE3 page - not in use for now
     *
     * @return string
     */
    public function actionMain2()
    {
        $forms[] = ['forms' => Yii::$app->params['esp_forms']];
        $forms[] = ['prefix' => 'overlay', 'forms' => Yii::$app->params['esp_forms_overlay']];

        return $this->render('main2', [
            'forms' => $forms
        ]);
    }
}
