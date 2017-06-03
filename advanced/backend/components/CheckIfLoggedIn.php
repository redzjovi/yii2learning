<?php

namespace backend\components;

use yii\base\Behavior;

class CheckIfLoggedIn extends Behavior
{
    public function events()
    {
        return [
            \yii\web\Application::EVENT_BEFORE_REQUEST => 'checkIfLoggedIn',
        ];
    }

    public function checkIfLoggedIn()
    {
        if (\Yii::$app->user->isGuest) {
            echo 'you are a guest';
        } else {
            echo 'you are logged in';
        }
        die;
    }
}
