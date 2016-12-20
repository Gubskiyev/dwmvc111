<?php
class ControllerAdmin extends Controller {

    public function __construct(){
        //$this->model = new ModelAdmin();
        $this->view = new View();
    }

    public function actionView() {
        $this->view->render('Админ-панель', 'admin/index.php', 'template.php');
    }
}