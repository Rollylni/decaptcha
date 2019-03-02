<?php

namespace jumper423\decaptcha\services;

/**
 * Class RuCaptchaGrid.
 */
class RuCaptchaClick extends RuCaptchaGrid
{
    public function init()
    {
        parent::init();

        unset(
            $this->paramsNames[static::ACTION_FIELD_RECAPTCHA],
            $this->actions[static::ACTION_RECOGNIZE][static::ACTION_FIELDS][static::ACTION_FIELD_RECAPTCHA]
        );

        $this->paramsNames[static::ACTION_FIELD_COORDINATE] = 'coordinatescaptcha';

        $this->actions[static::ACTION_RECOGNIZE][static::ACTION_FIELDS][static::ACTION_FIELD_INSTRUCTIONS][static::PARAM_SLUG_REQUIRE] = false;
        $this->actions[static::ACTION_RECOGNIZE][static::ACTION_FIELDS][static::ACTION_FIELD_COORDINATE] = [
            static::PARAM_SLUG_DEFAULT    => 1,
            static::PARAM_SLUG_TYPE       => static::PARAM_FIELD_TYPE_INTEGER,
            static::PARAM_SLUG_NOTWIKI    => true,
        ];

        $this->wiki->setText(['service', 'name'], 'RuCaptcha ClickCaptcha');
        $this->wiki->setText(['recognize', 'price'], [
            'ru' => 'Стоимость 1000 распознаний данной капчи - 70 рублей.',
            'en' => 'It costs $1,2 to recognize 1000 CAPTCHAs this way.',
        ]);
        $this->wiki->setText(['recognize', 'desc'], [
            'ru' => 'Распознание любой ClickCaptcha (в том числе и ReCaptcha 2.0). В ответ приходит массив координат, от верхнего левого угла.',
            'en' => 'Recognizing any ClickCaptcha (including ReCaptcha 2.0). In response comes an array of coordinates from the top left corner.',
        ]);
        $this->wiki->setText(['recognize', 'data'], [
            static::ACTION_FIELD_INSTRUCTIONS => 'Where\'s the cat?',
        ]);
        $this->wiki->setText(['menu', 'from_service'], [
            RuCaptcha::class,
            RuCaptchaInstruction::class,
            RuCaptchaGrid::class,
            RuCaptchaReCaptcha::class,
            RuCaptchaKeyCaptcha::class,
        ]);
    }

    /**
     * @return array
     */
    public function getCode()
    {
        $code = parent::getCode();
        $code = explode(':', $code)[1];
        $code = explode(';', $code);
        $result = [];
        foreach ($code as $row) {
            $rowCoord = explode(',', $row);
            foreach ($rowCoord as &$rowCoordOne) {
                $rowCoordOne = substr($rowCoordOne, 2);
            }
            $result[] = $rowCoord;
        }

        return $result;
    }
}
