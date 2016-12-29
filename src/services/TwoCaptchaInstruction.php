<?php

namespace jumper423\decaptcha\services;

/**
 * Class TwoCaptchaInstruction.
 */
class TwoCaptchaInstruction extends RuCaptchaInstruction
{
    protected $host = '2captcha.com';

    public function init()
    {
        parent::init();

        $this->wiki->setText(['service', 'name'], [
            'ru' => '2Captcha Инструкция',
        ]);
        $this->wiki->setText(['service', 'href'], 'http://infoblog1.ru/goto/2captcha');
    }
}
