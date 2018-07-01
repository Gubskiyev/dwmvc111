

<div class="col-md-4">
    <div class="card my-4">
        <h5 class="card-header">Вход</h5>
        <div class="card-body">
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
        </div>
    </div>
</div>
