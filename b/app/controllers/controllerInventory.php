<?php
class ControllerInventory extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelInventory();
        if(!$this->isLogin()) header('Location: /user/login');
    }

    public function actionView() {
        $data[] = $this->model->getInv();
        $this->view->render('Инвентарь', $data);
    }
}