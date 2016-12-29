<?php

include_once __DIR__.'/../src/core/DeCaptchaErrors.php';
include_once __DIR__.'/../src/core/DeCaptchaInterface.php';
include_once __DIR__.'/../src/core/DeCaptchaAbstract.php';
include_once __DIR__.'/../src/core/DeCaptchaBase.php';
include_once __DIR__.'/../src/services/RuCaptcha.php';
include_once __DIR__.'/../src/services/RuCaptchaReCaptcha.php';
include_once __DIR__.'/../src/services/RuCaptchaInstruction.php';
include_once __DIR__.'/../src/services/RuCaptchaGrid.php';
include_once __DIR__.'/../src/services/RuCaptchaClick.php';
include_once __DIR__.'/../src/services/Anticaptcha.php';
include_once __DIR__.'/../src/services/AnticaptchaReCaptchaProxeless.php';
include_once __DIR__.'/../src/services/AnticaptchaReCaptcha.php';
include_once __DIR__.'/../src/core/DeCaptchaWiki.php';

foreach (['ru', 'en'] as $lang) {
    foreach ([
                 new \jumper423\decaptcha\services\RuCaptcha([]),
                 new \jumper423\decaptcha\services\RuCaptchaReCaptcha([]),
                 new \jumper423\decaptcha\services\RuCaptchaInstruction([]),
                 new \jumper423\decaptcha\services\RuCaptchaGrid([]),
                 new \jumper423\decaptcha\services\RuCaptchaClick([]),
             ] as $class) {
        $tt = $class->getWiki($lang);
        $tt->save();
    }
}
