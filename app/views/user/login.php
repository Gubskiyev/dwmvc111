<h2 align="center">Вход</h2>
<form role="form" action="/user/login/" method="post" name="auth">
    <table align="center">
        <tr>
            <td>
                <input class="form-control" type="text" name="login" required placeholder="| Введите логин">
            </td>
        </tr>
        <tr>
            <td>
                <input class="form-control" type="password" name="pass" required placeholder="| Введите пароль">
            </td>
        </tr>
        <tr>
            <td>
                <br>
                <input class="btn btn-success" type="submit" name="auth" value="Авторизация">
                <a class="btn btn-default" href="/user/register/">Регистрация</a>
            </td>
        </tr>
    </table>
</form>