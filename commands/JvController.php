<?php

namespace app\commands;

use app\models\Trans;
use yii\console\Controller;
use Yii;

class JvController extends Controller
{
    public function actionIndex()
    {
        error_reporting(1);
        ini_set('display_errors', 1);

        require_once 'contest/logger.class.php';
        include_once 'contest/group.php';

        date_default_timezone_set ( "Asia/Jerusalem");

        $start_date = (date("Y-m-d",time() - 84600));
        $end_date = date("Y-m-d",time());

        $result = $this->getStats($start_date,$end_date,1);

        $i = 1;

        while (count($result->data->transaction) > 0 && $i < 100) {
            foreach ($result->data->transaction as $transaction) {
                if ($transaction->action == "sale" && $transaction->type == "CPA") {
                    $offer_name = '';
                    if ($transaction->campaignID == 367473 || $transaction->campaignID == 367493) //CF
                        $offer_name = 'cf';
                    else if ($transaction->campaignID == 328873 || $transaction->campaignID == 332613) //pma
                        $offer_name = 'pma';
                    else if ($transaction->campaignID == 388678 || $transaction->campaignID == 388688) //clickmoney
                        $offer_name = 'cm';
                    else if ($transaction->campaignID == 328873 || $transaction->campaignID == 332613) //pma
                        $offer_name = 'pma';
                    else if ($transaction->campaignID == 344423) //jv
                        $offer_name = 'jv';

                    if ($offer_name) {
                        $UTC = new \DateTimeZone("Asia/Jerusalem");
                        $newTZ = new \DateTimeZone("America/New_York");
                        $date = new \DateTime($transaction->actionDate, $UTC);
                        $date->setTimezone($newTZ);
                        $time = $date->format('Y-m-d H:i:s');

                        $this->setStats($transaction->affiliate, $transaction->actionID, $time, $offer_name);
                    }
                }
            }

            $i++;
            $result = $this->getStats(date("Y-m-d", time() - 84600), date("Y-m-d", time()), $i);
        }
    }


    function getStats($date, $todate, $page)
    {
        // Get todays transactions.
        $url = 'https://www.clicksure.com/advertiser/api/v1/transactions';

        $api_key = '6VLAYsHtD5iMPp6sRLeTdiOyaUD6JR7t';
        $headers = array(
            'Content-Type: text/xml',
            'Authorisation: ' . $api_key,
        );

        // Create new CURL Instance
        $session = curl_init($url);

        $root = '<?xml version="1.0" encoding="UTF-8"?><xml/>';
        $xml_object = new \simpleXMLElement($root);
        $child = $xml_object->addChild('data');

        // Set the start date and end date to today
        $child->addChild('page', "$page");
        $child->addChild('start', date('Y-m-d', strtotime($date)));
        $child->addChild('end', date('Y-m-d', strtotime($todate)));

        // Convert object to string
        $xml_data = $xml_object->asXML();

        curl_setopt_array($session, array(
            CURLOPT_TIMEOUT => 90,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_FAILONERROR => true,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $xml_data
        ));

        // Post data and get xml response
        $response = curl_exec($session);

        // Convert xml string to object
        $result = simplexml_load_string($response);

        if ($response === false) {
            $error = curl_error($session);
            throw new \Exception('CURL ERROR' . $error);
        }

        return $result;
    }

    function setStats($aff, $actionid, $timestamp, $offer_name)
    {
        $aff_id = $aff;
        $aff = groupit($aff);
        if (!$this->checkIfExists($actionid)) {

            $this->addStats($aff, $actionid, $timestamp, $aff_id, $offer_name);
        }
    }

    function checkIfExists($actionid)
    {
        $arrCustomer = (new \yii\db\Query())
            ->select('*')
            ->from('trans')
            ->where(['actionid' => $actionid])
            ->exists();
        if (! $arrCustomer)
            return false;
        else
            return true;
    }

    function addStats($aff, $actionsid, $timestamp, $aff_id, $offer_name)
    {
        (new Trans([
            'aff_id' => (string)$aff_id,
            'aff' => (string)$aff,
            'actionid' => (string)$actionsid,
            'datetime' => $timestamp,
            'offer_name' => (string)$offer_name
        ]))->save();
    }
}