<header>
    <?php if(isset($_COOKIE['login'])) { ?>
        <div id="header">
            <div>
                <a href="info?id=<?=$_COOKIE['id']?>"><?=$_COOKIE['login']?></a>
                <a href="/user/logout"><small>[Выйти]</small></a>
            </div>
            <div align="center">
                <nav>
                    <a href="/user/">Персонаж</a> |
                    <a href="#">Почта</a> |
                    <a href="#">Карта</a> |
                    <a href="/forum/">Форум</a>
                </nav>
            </div>
            <br>
        </div>
        <?php }else { ?>
        <div id="header">
            <div align="center">
                <nav>
                    <a href="/user/login/">Вход в игру</a> |
                    <a href="/user/register/">Регистрация</a> |
                    <a href="/forum/">Форум</a>
                </nav>
            </div>
            <br>
        </div>
        <?php } ?>
</header>