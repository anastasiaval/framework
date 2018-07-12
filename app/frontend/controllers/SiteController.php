<?php

namespace app\frontend\controllers;

use app\frontend\models\User;
use system\components\App;
use system\components\Controller;

class SiteController extends Controller {

    /**
     * 'site/index' action handler
     */
    public function actionIndex() {
        // create new User model
        $user = new User();

        // try to load by HTML form
        if ($user->load(App::$current->request->post())) {
            $check = User::findOne(['login' => $_POST['User']['login']]);
            if ($check->password === $user->password) {
                $_SESSION['u_id'] = $check->id;
                $_SESSION['u_login'] = $check->login;
                echo 'You are logged in!';
                print_r($_SESSION);
            } else {
                echo 'You are NOT logged in!';
            }
        }

        if (isset($_POST['logout'])) {
            session_start();
            session_unset();
            session_destroy();
            echo 'You are logged out!';
            print_r($_SESSION);
        }

        if (isset($_POST['signup'])) {
            var_dump($_POST['User']['login']);
            var_dump($user->login);
            $check = User::findOne(['login' => $_POST['User']['login']]);
            if (!$check) {
                $user->save();
            } else {
                echo 'Username exists!';
            }
        }

        // render Twig template or JSON (with AJAX checking by Controller)
        $this->render('index', [
            'message' => 'site/index',
            'model' => $user,
        ]);
    }

}