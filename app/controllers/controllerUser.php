<?php
class ControllerUser extends Controller {

    public function __construct() {
        $this->model = new ModelUser();
        $this->view = new View();
    }

    public function actionView() {
        if(!$this->isLogin()) header('Location: /user/login'); //Проверка на логон
        $data = $this->model->getUserData($_COOKIE['login']);
        $data2 = $this->model->getSkill();
        $this->view->render('Персонаж','viewUserIndex.php','template.php',$data,$data2);
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
                $this->view->render('Регистрация','viewUserRegister.php','template.php');
            } else {
                print "<b>При регистрации произошли следующие ошибки:</b><br>";
                foreach($err AS $error){
                    print $error."<br>";
                }
                $this->view->render('Регистрация','viewUserRegister.php','template.php');
            }

        } else {
            $title = 'Регистрация';

            $this->view->render($title,'viewUserRegister.php','template.php');
        }
    }

    public function actionLogin() {
        if (isset($_POST['auth'])) {
            $login = $_POST['login'];
            $pass = trim(strip_tags($_POST['pass']));
            $pass = md5($pass);

            $data = $this->model->getUser($login);
            //var_dump($data['pass']);die;
            if ($data['pass'] === $pass) {
                //$hash = md5($user->generateCode(10));

                setcookie("login", $login, time() + 36000, "/");
                setcookie("id", $data['id'], time() + 36000, "/");
                header('Location: /user/');
            } else {
                print "Вы ввели неправильный логин/пароль<br>";
                $this->view->render('Авторизация','viewUserLogin.php','template.php');
            }
        } else {
            $title = 'Вход в игру';
            $data = '';
            $this->view->render($title, 'viewUserLogin.php', 'template.php', $data);
        }
    }

    public function actionInfo() {
        $id = trim(strip_tags(intval($_GET['id'])));
        if($id == NULL && $id == '') header('Location: /user?id=1');
        if(intval($id)) {
            $data = $this->model->getUserDataByID($id);
            $this->view->render('Информация','viewUserInfo.php','template.php',$data);
        }
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