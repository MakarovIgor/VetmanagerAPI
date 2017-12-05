<?php
/**
 * Created by PhpStorm.
 * User: Таптыгин
 * Date: 04.12.2017
 * Time: 10:10
 */

class Vetmanager
{
    private $api_key = null;
    private $api_url = null;

    public function __construct($domain, $apiKey) {
        $this->api_key = $apiKey;
        $this->api_url = "https://" . $domain . "/rest/api/";
    }
    public function request($modelName, $pkValue = '', $data = array(), $method = 'GET') {
        $url = $this->api_url . "{$modelName}";
        if (!empty($pkValue)) {
            $url.= '/' . $pkValue;
        }
        $headers = array('X-REST-API-KEY:' . $this->api_key);
        $getData = $data;

        if (is_array($data)) {
            $data = json_encode($data);
        } else {
            $data = (string) $data;
        }
        $handle = curl_init();

        curl_setopt($handle, CURLOPT_USERAGENT, 'WireCRM Rest API');
        curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, 0);
        if (in_array($method, array('POST', 'PUT', 'DELETE'))) {
            curl_setopt($handle, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
        } else if("GET" == $method && !empty($getData)) {
            $url .= '?' . http_build_query($getData);
        }
        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($handle);

        curl_close($handle);
        $array = json_decode($data, true);

        return $array;
    }

}