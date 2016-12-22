<h2 align="center">Регистрация</h2>
<form role="form" action="/user/register" method="post" name="reg">
    <table align="center">
        <tr>
            <td>
                <input class="form-control" type="text" name="login" required placeholder="| Введите логин">
            </td>
        </tr>
        <tr>
            <td>
                <input class="form-control" type="password" name="pass1" required placeholder="| Введите пароль">
            </td>
        </tr>
        <tr>
            <td>
                <input class="form-control" type="password" name="pass2" required placeholder="| Повторите пароль">
            </td>
        </tr>
        <tr>
            <td>
                <img src="captcha.php" /><br>
                <input class="form-control" type="text" name="captcha"  placeholder="| Введите текст"/>
            </td>
        </tr>
        <tr>
            <td>
                <br>
                <input class="btn btn-success" type="submit" name="reg" value="Регистрация">
                <a class="btn btn-default" href="/user/login">Авторизация</a>
            </td>
        </tr>
    </table>
</form>