<?php
class ControllerMail extends Controller {

    public function __construct(){
        $this->model = new ModelMail();
        $this->view = new View();
        if(!$this->isLogin()) header('Location: /user/login'); //Проверка на логон
    }

    public function actionCantread() {
        $this->view->render('Сообщение', 'mail/cantread.php', 'template.php');
    }

    public function actionView() {
        $login = $_COOKIE['login'];
        $data = $this->model->getMailByUser($login);
        $this->view->render('Почта', 'mail/index.php', 'template.php', $data);
    }

    public function actionRead() {
        $id = $_GET['sms_id'];
        $data = $this->model->getInboxMailBySmsID($id);
            if($_COOKIE['login'] != $data[0]['reciever']) header('Location: /mail/cantread'); //Если получатель не я то ошибка
        $this->view->render('Сообщение', 'mail/read_in.php', 'template.php', $data);
    }


}