<?php
namespace app\helpers;

Class GetIp
{

    static function getIpAddr()
    {
        $ip_add = self::get_ip_address();

        $loca_data = array();
        $cookie_name = 'pmaloc';
        if ((!empty($_COOKIE[$cookie_name]))) {
            $loca_data = explode("|||", $_COOKIE[$cookie_name], 2);
        }

        if ((!empty($loca_data[0])) && (!empty($loca_data[1]))) {
//            define('UCOUNTRY', $loca_data[0]);
//            define('UCITY', $loca_data[1]);
        } else {
            $ipno = self::Dot2LongIP($ip_add);

    //    $mcache = new MemCache();
    //    $mcache->init();

    //    $res = $mcache->get($ipno);

    //            $query = "SELECT country_name,city_name FROM geoip2_citylegacy WHERE ip_to >= '$ip_add' order by ip_to limit 1";
    //            $res = $db->select($query);
            $res = (new \yii\db\Query())
                ->select(['country_name', 'city_name'])
                ->from('geoip2_citylegacy')
                ->where(['>=', 'ip_to', $ip_add])
                ->orderBy('ip_to')
                ->limit(1)
                ->all();


//            \Yii::$app->params['UCOUNTRY'] = str_replace('"', "", $res[0]['country_name']);
//            \Yii::$app->params['UCITY'] = str_replace('"', "", $res[0]['city_name']);

//            define('UCOUNTRY', str_replace('"', "", $res[0]['country_name']));
//            define('UCITY', str_replace('"', "", $res[0]['city_name']));
    //    var_dump(UCOUNTRY);die;
//            if (UCOUNTRY && UCITY) {
//                $cookie_val = (UCOUNTRY . '|||' . UCITY);
//    //setcookie($cookie_name, ($cookie_val), (time() + (86400 * 7)), "/");
//
//            }
            return ['UCOUNTRY' => str_replace('"', "", $res[0]['country_name']), 'UCITY' => str_replace('"', "", $res[0]['city_name'])];
        }
    }


    static function get_ip_address()
    {
        $ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
        foreach ($ip_keys as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
    // trim for safety measures
                    $ip = trim($ip);
    //var_dump($ip);
    //echo '<br/>';
    // attempt to validate IP
                    if (self::validate_ip($ip)) {
                        return $ip;
                    }
                }
            }
        }
        return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
    }

    /**
     * Ensures an ip address is both a valid IP and does not fall within
     * a private network range.
     */
    static function validate_ip($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
            return false;
        }
        return true;
    }

    static function sendCurl($loc_url)
    {
        $client = curl_init($loc_url);

        curl_setopt($client, CURLOPT_URL, $loc_url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($client, CURLOPT_FOLLOWLOCATION, true);
        return $res = json_decode(curl_exec($client));
    }

    // Function to convert IP address (xxx.xxx.xxx.xxx) to IP number (0 to 256^4-1)
    static function Dot2LongIP($IPaddr)
    {
        if ($IPaddr == "") {
            return 0;
        } else {
            $ip = explode(".", $IPaddr);
            return ($ip[3] + $ip[2] * 256 + $ip[1] * 256 * 256 + $ip[0] * 256 * 256 * 256);
        }
    }
}