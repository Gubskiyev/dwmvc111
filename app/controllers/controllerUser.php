<?php
class ControllerUser extends Controller {

    public function __construct() {
        parent::__construct();
        $this->model = new ModelUser();
        $this->view = new View();
    }

    public function actionView() {
        if(!$this->isLogin()) header('Location: /user/login'); //Проверка на логон
        $data = $this->model->getUserData($_COOKIE['login']);
        $data2 = $this->model->getSkill();
        $this->view->render('Персонаж','user/index.php','template.php',$data,$data2);
    }

    public function actionRegister() {
        if(isset($_POST['reg'])) {
            $login = trim(strip_tags($_POST['login']));
            $pass1 = md5($_POST['pass1']);
            $pass2 = md5($_POST['pass2']);
            $err = [];

            # проверям логин
            if(!preg_match("/^[a-zA-Z0-9]+$/",$login)){
                $err[] = "Логин может состоять только из букв английского алфавита и цифр";
            }

            if(strlen($login) < 3 or strlen($login) > 30){
                $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
            }

            if($this->model->getCountUser($login) > 0){
                $err[] = "Пользователь с таким логином уже существует в базе данных";
            }

            if($pass1 != $pass2){
                $err[] = "Введите одинаковые пароли";
            }

            if(count($err) == 0) {
                $this->model->userAdd($login,$pass1);
                echo "Пользователь создан!<br>";
                $this->view->render('Регистрация','user/register.php','template.php');
            } else {
                print "<b>При регистрации произошли следующие ошибки:</b><br>";
                foreach($err AS $error){
                    print $error."<br>";
                }
                $this->view->render('Регистрация','user/register.php','template.php');
            }

        } else {
            $title = 'Регистрация';

            $this->view->render($title,'user/register.php','template.php');
        }
    }

    public function actionLogin() {
        if (isset($_POST['auth'])) {
            $login = $_POST['login'];
            $pass = trim(strip_tags($_POST['pass']));
            $pass = md5($pass);

            $data = $this->model->getUser($login);

            if ($data['pass'] === $pass) {
                setcookie("login", $login, time() + 36000, "/");
                setcookie("id", $data['id'], time() + 36000, "/");
                header('Location: /user/');
            } else {
                print "Вы ввели неправильный логин/пароль<br>";
                $this->view->render('Авторизация','user/login.php','template.php');
            }
        } else {
            $title = 'Вход в игру';
            $this->view->render($title, 'user/login.php', 'template.php');
        }
    }

    public function actionInfo() {
        $id = trim(strip_tags(intval($_GET['id'])));
        if($id == NULL || $id == '' || $id == '0') header('Location: info?id=1');
        if(intval($id)) {
            $data = $this->model->getUserDataByID($id);
            $this->view->render('Информация','user/info.php','template.php',$data);
        }
    }

    public function actionSearch() {
        if(isset($_GET['login'])) {
            $login = trim(strip_tags($_GET['login']));
            $data = $this->model->getUser($login);
                if($data != NULL) header("Location: /user/info?id=".$data['id']);
            else $this->view->render('Найти игрока', 'user/searchError.php', 'template.php');
        }else $this->view->render('Найти игрока', 'user/search.php', 'template.php');
    }

    public function actionSendmoney() {
        if(isset($_POST['sendmoney'])) {
            $receiver = $_POST['receiver'];
            $money = $_POST['money'];
            $text = $_POST['text'];
            $myMoney = $this->model->getUserData($_COOKIE['login']);
            $myLogin = $_COOKIE['login'];

            if($money <= 0) {
                $data = 'Сумма не может быть меньше 1$';
                $this->view->render('Найти игрока', 'user/sendmoneyStatus.php', 'template.php', $data);exit;
            }elseif($this->model->getUser($receiver) == NULL) {
                $data = 'Игрок не найден';
                $this->view->render('Найти игрока', 'user/sendmoneyStatus.php', 'template.php', $data);exit;
            }elseif(strlen($text) > 100) {
                $data = 'Комментарий слишком длинный';
                $this->view->render('Найти игрока', 'user/sendmoneyStatus.php', 'template.php', $data);
                exit;
            }elseif($myMoney[0]['money'] < $money){
                $data = 'У меня нет столько денег';
                $this->view->render('Найти игрока', 'user/sendmoneyStatus.php', 'template.php', $data);
                exit;
            }else{
                $this->model->userSendMoney($myLogin,$receiver,$money);
                $data = 'Сумма в размере '.$money.' отправлена персонажу '.$receiver.'.';
                $this->view->render('Найти игрока', 'user/sendmoneyStatus.php', 'template.php', $data);exit;
            }
        }
        $this->view->render('Перевод денег', 'user/sendmoney.php', 'template.php');
    }

    public function actionLogout() {
        foreach($_COOKIE as $k => $v)
        setcookie($k, '' , time()-999, "/");
        header('Location: /');
    }

    public function actionCookie() {
        var_dump($_COOKIE);
    }

}