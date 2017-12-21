<?php
class ControllerMap extends Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->isLogin()) header('Location: /user/login'); //Проверка на логон
        $this->model = new ModelMap();
        $this->view = new View();
    }

    public function actionView() {
        $data = $this->model->getAllSectors();

        $this->view->render('Карта','map/index.php','template.php', $data);
    }
}