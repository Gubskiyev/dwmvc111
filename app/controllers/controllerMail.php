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
        $data = $this->model->getInboxMailByUser($login);

        $this->view->render('Почта', 'mail/inbox.php', 'template.php', $data, $data2);
    }

    public function actionOutbox() {
        $login = $_COOKIE['login'];
        $data = $this->model->getOutboxMailByUser($login);
        $this->view->render('Почта', 'mail/outbox.php', 'template.php', $data);
    }

    public function actionRead() {
        $id = $_GET['id_mail'];
        $login = $_COOKIE['login'];

        if($_GET['type'] == 1) {
            $data = $this->model->getInboxMailBySmsID($id,$login);
            $this->view->render('Сообщение', 'mail/readInBox.php', 'template.php', $data);

        }elseif ($_GET['type'] == 2) {
            $data = $this->model->getOutboxMailBySmsID($id,$login);
            $this->view->render('Сообщение', 'mail/readOutBox.php', 'template.php', $data);
        }else header("Location: /mail/cantread ");
    }

    public function actionNew() {
        if($_GET['mailto']) {
            if(!$this->model->getUserData($_GET['mailto'])) Router::page404();
        }
        $this->view->render('Новое письмо', 'mail/new.php', 'template.php');
    }

    public function actionPostMail() {
        if(isset($_POST) && $_POST != NULL) {
            $sender = $_COOKIE['login'];
            $receiver = trim(strip_tags($_POST['receiver']));
            $date = date('d/m, H:i');
            $title = $_POST['title'];
            $text = trim(strip_tags($_POST['text']));
            $type = $_POST['type'];

            if(empty($title)) $title = 'RE:';

            $this->model->addNewMail(1,$sender, $receiver, $date, $title, $text);
            $this->model->addNewMail(2,$sender, $receiver, $date, $title, $text);

            header("location: /mail");
        } else header("Location: new");
    }

    public function actionDelMessage()
    {
        foreach ($_POST['id'] as $id) {
           $this->model->delMailMessage($id);
        }
        header("Location: /mail/");
    }

}