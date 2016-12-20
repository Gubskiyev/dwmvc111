<?php
class ControllerMap extends Controller {
    public function __construct() {
        $this->model = new ModelMap();
        $this->view = new View();
    }

    public function actionView() {
        if(!$this->isLogin()) header('Location: /user/login'); //Проверка на логон
        $this->view->render('Карта','map/index.php','template.php');
    }
}