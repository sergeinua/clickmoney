<?php

namespace app\controllers;

use Yii;
class C2mController extends \yii\web\Controller
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

        return $this->render('@app/views/site/main', [
            'forms' => $forms,
            'exitSplAndPopup' => false
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
            'exitSplAndPopup' => false
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
            'exitSplAndPopup' => false,
            'gi' => $gi,
            'gi_mobile' => $gi_mobile
        ]);
    }

}
