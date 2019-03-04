2Captcha ReCaptcha v2 without a browser
==============
Menu
--------------
+ [Main](../docs/README-en.md)
+ [Документация на русском языке](../docs/TwoCaptchaReCaptcha-ru.md)
+ Anchor
  + [Link](#link)
  + [The description of the service](#the-description-of-the-service)
  + [Prices](#prices)
  + [Description recognition](#description-recognition)
  + [Installation](#installation)
  + [Examples](#examples)
  + [A description of the fields](#a-description-of-the-fields)
+ Other functionality from the service
  + [2Captcha](../docs/TwoCaptcha-en.md)
  + [2Captcha Manual](../docs/TwoCaptchaInstruction-en.md)
  + [2Captcha ClickCaptcha](../docs/TwoCaptchaClick-en.md)
  + [2Captcha Grid (ReCaptcha v2)](../docs/TwoCaptchaGrid-en.md)
  + [2Captcha KeyCaptcha](../docs/TwoCaptchaKeyCaptcha-en.md)
  + [2Captcha FunCaptcha](../docs/TwoCaptchaFunCaptcha-en.md)
  + [2Captcha ReCaptcha v3](../docs/TwoCaptchaReCaptchaV3-en.md)


Link
--------------
[The link to the service 2Captcha ReCaptcha v2 without a browser](http://infoblog1.ru/goto/2captcha)

The description of the service
--------------
RuCaptcha.com - antikapchu service manual image recognition, there are those who need real-time to recognize text from scanned documents, forms, and captures those who want to earn on entering text from the screen.

The system works the Russian-speaking and English-speaking staff.

Tuning anticaptcha RuCaptcha.com not only supports API standard on par with pixodrom services, antigate, anti-captcha and others, but also provides advanced functional replenishing at each round of combat automation. API RuCaptcha supports the decision ReCaptcha v2 (where you need to click on the pictures), ClickCaptcha (where you need to click on certain points) and Rotatecaptcha (FunCaptcha other CAPTCHA, you need to twist).

Prices
--------------
1000 for $2,99

Description recognition
--------------
This method allows you to pass the reCAPTCHA without emulation browser and send us pictures, as this method gives 100% passing captcha.
            
Where any information to take and where to insert?
See page HTML-code, where you met the captcha:

1. Locate the parameter
data-sitekey =
This site key, it is constant and unique for each site (if the site administrator does not change it manually)

2.Locate form for text
```<textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none; "></textarea>```
Here you will need to insert a reply from us.

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
use jumper423\decaptcha\services\TwoCaptchaReCaptcha;

$captcha = new TwoCaptchaReCaptcha([
    TwoCaptchaReCaptcha::ACTION_FIELD_KEY => '94f39af4bb295c40546fba5c932e0d32',
]);
```
__Recognition__
In the first parameter, pass the link or path to the picture file in the second parameters of the recognition if necessary, override those which were transferred during the initialization.
```
if ($captcha->recognize([
       TwoCaptchaReCaptcha::ACTION_FIELD_GOOGLEKEY => '54as5c6a5s4ca4s56a4sc56a',
       TwoCaptchaReCaptcha::ACTION_FIELD_PAGEURL => 'http://site.com/recaptcha-ex',
    ])) {
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
    $captcha->recognize([
       TwoCaptchaReCaptcha::ACTION_FIELD_GOOGLEKEY => '54as5c6a5s4ca4s56a4sc56a',
       TwoCaptchaReCaptcha::ACTION_FIELD_PAGEURL => 'http://site.com/recaptcha-ex',
    ]);
    $code = $captcha->getCode();
} catch (\jumper423\decaptcha\core\DeCaptchaErrors $e) {
    ...
}
```


A description of the fields
--------------
 Name | Code | Type | Req. | By def. | Possible values | Description 
 --- | --- | --- | --- | --- | --- | --- 
 Key | ACTION_FIELD_KEY | STRING | + |  |  | Key account |
 Cross-domain | ACTION_FIELD_HEADER_ACAO | INTEGER | - | 0 | 0 - the default value; 1 - in.php will transfer Access-Control-Allow-Origin: * parameter in response header | Need for cross-domain AJAX requests in browser-based applications. |
 Manual | ACTION_FIELD_INSTRUCTIONS | STRING | - |  |  | Text captcha or manual to pass the captcha. |
 Google key | ACTION_FIELD_GOOGLEKEY | STRING | + |  |  | Key-the identifier of the recaptcha on the landing page. <div class="g-recaptcha" data-sitekey="THIS"></div> |
 The proxy address | ACTION_FIELD_RECAPTCHA | STRING | - |  |  | IP address of the proxy ipv4/ipv6. |
 The proxy type | ACTION_FIELD_PROXYTYPE | STRING | - |  |  | The proxy type (http, socks4, ...) |
 Link | ACTION_FIELD_PAGEURL | STRING | + |  |  | The address of the page where the captcha is solved. |
 Invisible ReCaptcha | ACTION_FIELD_INVISIBLE | INTEGER | - | 0 |  | 1 - tells us that the site is invisible ReCaptcha. 0 - regular ReCaptcha. |

