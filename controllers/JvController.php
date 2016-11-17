<?php

namespace app\controllers;

use app\models\Trans;

class JvController extends \yii\web\Controller
{
    /**
     * Index page
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionWeekendClick()
    {
        $headers = apache_request_headers();

        $is_ajax = 0;
        if((isset($headers['X-Requested-With']) && $headers['X-Requested-With'] == 'XMLHttpRequest' ))
            $is_ajax = 1;
        else if((isset($headers['x-requested-with']) && $headers['x-requested-with'] == 'XMLHttpRequest' ))
            $is_ajax = 1;

        if((!$is_ajax)) {
            $data = array();
            echo json_encode($data);
            exit;
        }

        $server = $_SERVER['SERVER_NAME'];

        if($server=='clickmoneysystem.com' || $server=='www.clickmoneysystem.com') {
            date_default_timezone_set("America/New_York");
            $i=1;
            $html='';
            $class = array('first','second','third','');
            $prizeArray=array();
            $prizeArray[1]='$1,500';
            $prizeArray[2]='$750';
            $prizeArray[3]='$500';
            $prizeArray[4]='$250';
            $prizeArray[5]='$100';
            $prizeArray[6]='';
            $prizeArray[7]='';
            $prizeArray[8]='';
            $prizeArray[9]='';
            $prizeArray[10]='';
            $arrSalesStats[1] = 'Jordan B';
            $arrSalesStats[2] = 'Martin S';
            $arrSalesStats[3] = 'Dave R';
            $arrSalesStats[4] = 'g****n';
            $arrSalesStats[5] = 'Lion';
            $arrSalesStats[6] = 'Warren';
            $arrSalesStats[7] = 'JP';
            $arrSalesStats[8] = '0****9';
            $arrSalesStats[9] = 'j****c';
            $arrSalesStats[10] = 'j****m';

            for($j=0; $j <count($arrSalesStats); $j++) {
                $html .= "<tr><td class='text-center'>{$i}</td><td class='text-center'>" . $arrSalesStats[$i] . "</td><td class='text-center'>" . $prizeArray[$i] . "</td></tr>";
                $i++;
            }

            $html .= "<tr><td class='text-center' colspan='3'>&nbsp;</td></tr>";
            header('Content-Type: application/json');
            echo $html;
        }
    }

    /**
     * Contest page
     * @return string
     */
    public function actionContest()
    {
        return $this->render('contest');
    }
}
