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
        $this->view->render('Почта', 'mail/inbox.php', 'template.php', $data);
    }

    public function actionOutbox() {
        $login = $_COOKIE['login'];
        $data = $this->model->getOutboxMailByUser($login);
        $this->view->render('Почта', 'mail/outbox.php', 'template.php', $data);
    }

    public function actionRead() {
        $id = $_GET['id'];
        $data = $this->model->getInboxMailBySmsID($id);

        if ($data[0]['receiver'] == $_COOKIE['login']) {
            $this->view->render('Сообщение', 'mail/read.php', 'template.php', $data);
        }elseif($data[0]['sender'] == $_COOKIE['login']) {
            $this->view->render('Сообщение', 'mail/read.php', 'template.php', $data);
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

            if(empty($this->model->getUserData($receiver))) Router::page404();
            if(empty($title)) $title = 'RE:';

            $this->model->addNewMail($sender,$receiver,$date,$title,$text);
            header("location: /mail");
        } else header("Location: new");
    }


}