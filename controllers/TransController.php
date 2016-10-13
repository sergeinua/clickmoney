<?php

namespace app\controllers;

use Yii;
use app\models\Trans;
use app\models\TransSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\controllers\YMLP\YMLP_API;
use Aweber\AWeberAPI;

/**
 * TransController implements the CRUD actions for Trans model.
 */
class TransController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Trans models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Trans();

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            $model->actionid = 'FE1'; /* TODO: check the correct name of the page*/
//            $model->datetime = time();
//            $model->offer_name = 'offer_name'; /* TODO: check the correct name of the page*/
//            $model->save();

            require_once('aweber_api/aweber_api.php');

            // Step 1: assign these values from https://labs.aweber.com/apps
            $consumerKey = 'Ak3LThTlhZqImFoBjU3nC7CD';
            $consumerSecret = 'huTlp5roJ4zb8jjH5haOZw0LZND2AQZJQelNp54D';

            // Step 2: load this PHP file in a web browser, and follow the instructions to set
            // the following variables:
        $aweber = new AWeberAPI($consumerKey, $consumerSecret);

// Put the callback URL of your app below or set to 'oob' if your app isnt
// a web based application.
        $callbackURL    = 'https://www.example.com/your_application_callback_url';

// get a request token
        list($key, $secret) = $aweber->getRequestToken($callbackURL);

// get the authorization URL
        $authorizationURL = $aweber->getAuthorizeUrl();

// store the request token secret
        setcookie('secret', $secret);

// redirect user to authorization URL
        header("Location: $authorizationURL");
        exit();







        /* YMLP_API working!!!
        // variables: your key & username
        require_once 'YMLP_API.php';
        $ApiKey = "JQNPR3Q5MY6U13U8VV2Q";
        $ApiUsername = "tygt";
        // create API class
        $api = new YMLP_API($ApiKey,$ApiUsername);
        // run command
        $Email = "dummy@dummy.net";
        $OtherFields["Field2"]="Dummy Field2";
        $OtherFields["Field3"]="Dummy Field3";
        $GroupID = "1";
        $OverruleUnsubscribedBounced = "0";
        $output=$api->ContactsAdd($Email,$OtherFields,$GroupID,$OverruleUnsubscribedBounced);
        // output results
        if ($api->ErrorMessage){
            echo "There's a connection problem: " . $api->ErrorMessage;
        } else {
            echo "{$output["Code"]} => {$output["Output"]}";
        }
        */



//        }

        return $this->render('index', [
            'model' => $model
        ]);
    }



    function get_self(){
        return 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }

    function display_available_lists($account){
        print "Please add one of the lines of PHP Code below to the top of your script for the proper list<br>" .
            "then click <a href=\"" . get_self() . "\">here</a> to continue<p>";

        $listURL ="/accounts/{$account->id}/lists/";
        $lists = $account->loadFromUrl($listURL);
        foreach($lists->data['entries'] as $list ){
            print "\$list_id = '{$list['id']}'; // list name:{$list['name']}\n</br>";
        }
    }

    function display_access_tokens($aweber){
        if (isset($_GET['oauth_token']) && isset($_GET['oauth_verifier'])){

            $aweber->user->requestToken = $_GET['oauth_token'];
            $aweber->user->verifier = $_GET['oauth_verifier'];
            $aweber->user->tokenSecret = $_COOKIE['secret'];

            list($accessTokenKey, $accessTokenSecret) = $aweber->getAccessToken();

            print "Please add these lines of code to the top of your script:<br><br>" .
                "\$accessKey = '{$accessTokenKey}';\n<br>" .
                "\$accessSecret = '{$accessTokenSecret}';\n<br>" .
                "<br><br>" .
                "Then click <a href=\"" . get_self() . "\">here</a> to continue";
            exit;
        }

        if(!isset($_SERVER['HTTP_USER_AGENT'])){
            print "This request must be made from a web browser\n";
            exit;
        }

        $callbackURL = $this->get_self();
        list($key, $secret) = $aweber->getRequestToken($callbackURL);
        $authorizationURL = $aweber->getAuthorizeUrl();

        setcookie('secret', $secret);

        header("Location: $authorizationURL");
        exit();
    }
















    /**
     * Displays a single Trans model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Trans model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Trans();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->trans]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Trans model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->trans]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Trans model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Trans model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Trans the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Trans::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
