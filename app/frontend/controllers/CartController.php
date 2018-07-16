<?php

namespace app\frontend\controllers;

use system\components\Controller;
use app\frontend\models\Cart;

class CartController extends Controller {

    public function actionIndex() {
        return $this->render(
            'index'
        );
    }

    public function addToCart() {

    }

}

