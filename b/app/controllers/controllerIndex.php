<?php
class ControllerIndex extends Controller {

    public function actionView() {
        header('Location: /user/login');
    }

}