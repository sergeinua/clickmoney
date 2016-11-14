<?php

namespace app\controllers;

use app\models\Trans;

class JvController extends \yii\web\Controller
{
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

//$is_ajax = ( (isset($headers['X-Requested-With']) && $headers['X-Requested-With'] == 'XMLHttpRequest' ) ? 1 : 0);

        if((!$is_ajax))
        {
//            $data = array();
//
//            echo json_encode($data);
//            exit;
        }

        $server = $_SERVER['SERVER_NAME'];

        if($server=='clickmoneysystem.com' || $server=='www.clickmoneysystem.com' || $server == 'localhost')
        {
//            require_once 'db.class.php';
//            require_once 'group1.php';

            date_default_timezone_set("America/New_York");

            $day = date('d');
            $hour = date('H');

            $from_date = '2016-08-08 03:00';
            $to_date = '2016-08-15 03:00';
            //datetime >= '".$from_date."' AND

            $query1 = "SELECT aff, aff_id ,count(*) AS counter FROM trans WHERE datetime <= '".$to_date."' AND aff!='Tim Atkinson' AND aff!='Jordan B' AND aff!='Dave R' AND aff!='Tal & Itay' AND aff!='Jordan' GROUP BY aff HAVING count(*) >0 order by counter desc";

            //$query1 = "SELECT aff ,count(*) AS counter FROM trans WHERE datetime >= '".$from_date."' AND datetime <= '".$to_date."' AND aff!='Tim Atkinson' AND aff!='Jordan B' GROUP BY aff HAVING count(*) >0 order by counter desc";

            // $arrSalesStats = DB::instance()->fetchArray($query1);
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
            for($j=0; $j <count($arrSalesStats); $j++)
            {

                $html .= "<tr><td class='text-center'>{$i}</td><td class='text-center'>" . $arrSalesStats[$i] . "</td><td class='text-center'>" . $prizeArray[$i] . "</td></tr>";

                $i++;
            }

            /*if($i < 11)
            {
                for($j=$i; $j <11; $j++)
                {

                    $html .= "<tr><td class='text-center'>{$i}</td><td class='text-center'>-----</td><td class='text-center'>".$prizeArray[$i]."</td></tr>";
                    $i++;
                }
            }*/

            $html .= "<tr><td class='text-center' colspan='3'>&nbsp;</td></tr>";
            header('Content-Type: application/json');
            echo $html;
        }
    }

}
