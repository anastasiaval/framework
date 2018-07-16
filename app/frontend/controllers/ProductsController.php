<?php

namespace app\frontend\controllers;

use app\frontend\models\Products;
use system\components\Controller;

class ProductsController extends Controller {

    public function actionIndex() {
        $products = Products::findAll();

        $this->render(
            'index',
            ['products' => $products]
        );
    }

    public function actionView($id) {
        $model = Products::findById($id);

        return $this->render('view', [
            'model' => $model
        ]);
    }
}

