<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/03/17
 * Time: 17:32
 */
namespace HandissimoBundle\Service\Captcha;


class CaptchaVerifyModal
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
            'secret' => '6LfARBkUAAAAAKRCXTMGvUMQzia9R97NKeHnnKlZ', 'response' => $recaptcha
        ));
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response);

        return $data->success;
    }
}