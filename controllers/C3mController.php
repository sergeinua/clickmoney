<?php

namespace app\controllers;

use Yii;
class C3mController extends \yii\web\Controller
{
    /**
     * Renders index page
     *
     * @return string
     */
    public function actionIndex()
    {
        $forms[] = ['forms' => Yii::$app->params['esp_forms']];
        $forms[] = ['prefix' => 'overlay', 'forms' => Yii::$app->params['esp_forms_overlay']];

        return $this->render('@app/views/site/index', [
            'forms' => $forms,
            'exitSplAndPopup' => true
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

        return $this->render('@app/views/site/main', [
            'forms' => $forms,
            'exitSplAndPopup' => true
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

        return $this->render('@app/views/site/freereport', [
            'forms' => $forms
        ]);
    }

    /**
     * Renders accessapproved page
     *
     * @return string
     */
    public function actionAccessapproved()
    {
        return $this->render('@app/views/site/accessapproved', [
            'exitSplAndPopup' => true
        ]);
    }

    /**
     * Renders approved page
     *
     * @return string
     */
    public function actionApproved()
    {
        $gi = '4850';
        $gi_mobile = '4851';

        return $this->render('@app/views/site/approved', [
            'email' => Yii::$app->session->get('email'),
            'fname' => Yii::$app->session->get('fname'),
            'exitSplAndPopup' => true,
            'gi' => $gi,
            'gi_mobile' => $gi_mobile
        ]);
    }

    /**
     * Laststep page - exit page for the members page
     *
     * @return string
     */
    public function actionLaststep()
    {
        $gi = '4850';
        $gi_mobile = '4851';

        return $this->render('@app/views/site/laststep', [
            'email' => Yii::$app->session->get('email'),
            'fname' => Yii::$app->session->get('fname'),
            'gi' => $gi,
            'gi_mobile' => $gi_mobile
        ]);
    }

    /**
     * Members 3 page
     *
     * @return string
     */
    public function actionFinaloffer()
    {
        $gi = '4850';
        $gi_mobile = '4851';

        return $this->render('@app/views/site/finaloffer', [
            'email' => Yii::$app->session->get('email'),
            'fname' => Yii::$app->session->get('fname'),
            'gi' => $gi,
            'gi_mobile' => $gi_mobile
        ]);
    }
}
