DeCaptcha
================
[![Latest Stable Version](https://poser.pugx.org/jumper423/decaptcha/v/stable)](https://packagist.org/packages/jumper423/decaptcha)
[![Total Downloads](https://poser.pugx.org/jumper423/decaptcha/downloads)](https://packagist.org/packages/jumper423/decaptcha)
[![License](https://poser.pugx.org/jumper423/decaptcha/license)](https://packagist.org/packages/jumper423/decaptcha)

[![Build Status](https://travis-ci.org/jumper423/decaptcha.svg?branch=master)](https://travis-ci.org/jumper423/decaptcha)
[![Dependency Status](https://www.versioneye.com/user/projects/5849f365a662a5004c110a29/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/5849f365a662a5004c110a29)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jumper423/decaptcha/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jumper423/decaptcha/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/jumper423/decaptcha/badges/build.png?b=master)](https://scrutinizer-ci.com/g/jumper423/decaptcha/build-status/master)
[![Code Climate](https://codeclimate.com/github/jumper423/decaptcha/badges/gpa.svg)](https://codeclimate.com/github/jumper423/decaptcha)
[![Issue Count](https://codeclimate.com/github/jumper423/decaptcha/badges/issue_count.svg)](https://codeclimate.com/github/jumper423/decaptcha)
[![codecov](https://codecov.io/gh/jumper423/decaptcha/branch/master/graph/badge.svg)](https://codecov.io/gh/jumper423/decaptcha)
[![HHVM Status](http://hhvm.h4cc.de/badge/jumper423/decaptcha.svg)](http://hhvm.h4cc.de/package/jumper423/decaptcha)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/d485629c-1830-440d-82ab-a567bfa5ddc5/mini.png)](https://insight.sensiolabs.com/projects/d485629c-1830-440d-82ab-a567bfa5ddc5)
[![StyleCI](https://styleci.io/repos/75013766/shield?branch=master)](https://styleci.io/repos/75013766)

Menu
--------------
+ [Документация на русском языке](../master/docs/README-ru.md)
+ [Description](#description)
+ [Features](#features)
+ [Services](#services)
+ [Installation](#installation)
+ [Examples](#examples)


Description
--------------
Package created to standardize all services for solving captcha.
            Each service has its own features and now You will have to look at the documentation for the specific service to do everything right. 
            The package covers the entire functionality services. If You will be something lacking or suggestions, I'll be glad to hear them.

Features
--------------
+ Suitable for all recognition services captcha
+ You can easily add a new service using the existing engine
+ Intuitable fast and straightforward setup
+ Recognition as the path to the file and links
+ ReCaptcha v2 without a browser
+ Full documentation
+ Covered by tests

Services
--------------
Recognition captchas for all popular services

+ [RuCaptcha](../master/docs/RuCaptcha-en.md)
+ [RuCaptcha ReCaptcha v2 without a browser](../master/docs/RuCaptchaReCaptcha-en.md)
+ [RuCaptcha ReCaptcha v3](../master/docs/RuCaptchaReCaptchaV3-en.md)
+ [RuCaptcha Manual](../master/docs/RuCaptchaInstruction-en.md)
+ [RuCaptcha Grid (ReCaptcha v2)](../master/docs/RuCaptchaGrid-en.md)
+ [RuCaptcha ClickCaptcha](../master/docs/RuCaptchaClick-en.md)
+ [RuCaptcha KeyCaptcha](../master/docs/RuCaptchaKeyCaptcha-en.md)
+ [RuCaptcha FunCaptcha](../master/docs/RuCaptchaFunCaptcha-en.md)
+ [2Captcha](../master/docs/TwoCaptcha-en.md)
+ [2Captcha ReCaptcha v2 without a browser](../master/docs/TwoCaptchaReCaptcha-en.md)
+ [2Captcha ReCaptcha v3](../master/docs/TwoCaptchaReCaptchaV3-en.md)
+ [2Captcha Manual](../master/docs/TwoCaptchaInstruction-en.md)
+ [2Captcha Grid (ReCaptcha v2)](../master/docs/TwoCaptchaGrid-en.md)
+ [2Captcha ClickCaptcha](../master/docs/TwoCaptchaClick-en.md)
+ [2Captcha KeyCaptcha](../master/docs/TwoCaptchaKeyCaptcha-en.md)
+ [2Captcha FunCaptcha](../master/docs/TwoCaptchaFunCaptcha-en.md)
+ [Anti Captcha](../master/docs/Anticaptcha-en.md)
+ [AntiCaptcha ReCaptcha v2 without a browser (with a proxy)](../master/docs/AnticaptchaReCaptcha-en.md)
+ [AntiCaptcha ReCaptcha v2 without a browser](../master/docs/AnticaptchaReCaptchaProxeless-en.md)
+ [Captcha24](../master/docs/Captcha24-en.md)
+ [Pixodrom](../master/docs/Pixodrom-en.md)
+ [R.I.P. Captcha ](../master/docs/Ripcaptcha-en.md)
+ [SociaLink](../master/docs/Socialink-en.md)


Installation
--------------
The preferred way to install this extension via [composer](http://getcomposer.org/download/).

Or you can run
```
composer require --prefer-dist jumper423/decaptcha "*"
```
or add
```
"jumper423/decaptcha": "*"
```
in file `composer.json`.


Examples
--------------
__Initialization__
Specify the key mandatory and optional parameters. Try the best to fill this promotes more rapid recognition of captcha.
```
use jumper423\decaptcha\services\RuCaptcha;

$captcha = new RuCaptcha([
    RuCaptcha::ACTION_FIELD_KEY => '94f39af4bb295c40546fba5c932e0d32',
]);
```
__Recognition__
In the first parameter, pass the link or path to the picture file in the second parameters of the recognition if necessary, override those which were transferred during the initialization.
```
if ($captcha->recognize('http://site.com/captcha.jpg')) {
    $code = $captcha->getCode();
} else {
    $error = $captcha->getError();
}
```
__Not correctly recognized__
If You can understand that the answer which did not come true. Be sure to add below written code. It will save You money.
```
$captcha->notTrue();
```
__Balance__
```
$balance = $captcha->getBalance();
```
__Intercept errors__
If you wish, You can catch the error, but you need to call setCauseAnError
```
$captcha->setCauseAnError(true);

try {
    $captcha->recognize('http://site.com/captcha.jpg');
    $code = $captcha->getCode();
} catch (\jumper423\decaptcha\core\DeCaptchaErrors $e) {
    ...
}
```


