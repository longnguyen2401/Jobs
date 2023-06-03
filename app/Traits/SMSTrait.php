<?php

namespace App\Traits;

use Carbon\Carbon;

trait SMSTrait
{  
    /**
     * .
     *
     * @var string
     */
    public string $SERVER = 'https://go.freesms.vn';
    
    /**
     * .
     *
     * @var string
     */
    public string $API_KEY = '19ed50a291b54e53d61e5d1babb06d16dc874045';

    /**
     * .
     *
     * @var int
     */
    public int $USE_SPECIFIED = 0;

    /**
     * .
     *
     * @var int
     */
    public int $USE_ALL_DEVICES = 1;
    
    /**
     * .
     *
     * @var int
     */
    public int $USE_ALL_SIMS = 2;

    /**
    * Send single SMS
    *
    * @param array $data
    * @return array
    */
    function sendSingleMessage($number, $message, $device = 0, $schedule = null, $attachments = null, $prioritize = false)
    {
        $url = $this->SERVER . "/services/send.php";
        $postData = array(
            'number' => $number,
            'message' => $message,
            'schedule' => $schedule,
            'key' => $this->API_KEY,
            'devices' => $device,
            'type' => "sms",
            'attachments' => $attachments,
            'prioritize' => $prioritize ? 1 : 0
        );
        return $this->sendRequest($url, $postData)["messages"][0];
    }
    

    /**
    * Send SMS
    *
    * @param array $data
    * @return array
    */
    public function sendRequest($url, $postData)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch));
        }
        curl_close($ch);
        if ($httpCode == 200) {
            $json = json_decode($response, true);
            if ($json == false) {
                if (empty($response)) {
                    throw new Exception("Missing data in request. Please provide all the required information to send messages.");
                } else {
                    throw new Exception($response);
                }
            } else {
                if ($json["success"]) {
                    return $json["data"];
                } else {
                    throw new Exception($json["error"]["message"]);
                }
            }
        } else {
            throw new Exception("HTTP Error Code : {$httpCode}");
        }
    }
}