<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 01/03/17
 * Time: 10:53
 */
namespace HandissimoBundle\Service;



class CaptchaVerify
{
    /**
     * @param $recaptcha
     * @return mixed
     * method for test recaptcha form
     */
    public function verify($recaptcha)
    {
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            'secret' => '6Lc8vBYUAAAAAI-Rfhi1KUJUS0XIUN6kp4lEb-o5', 'response' => $recaptcha
        ));
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response);

        return $data->success;
    }
}