<header>
    <?php if(isset($_COOKIE['login'])) { ?>
        <div id="header">
            <div>
                <a href="info?id=<?=$_COOKIE['id']?>"><?=$_COOKIE['login']?></a>
                <a href="/user/logout"><small>[Выйти]</small></a><br>
                <small><?=date('H:i')?> YKT</small>
            </div>
            <div align="center">
                <nav>
                    <a href="/user/">Персонаж</a> |
                    <a href="/mail/">Почта</a> |
                    <a href="/map/">Карта</a> |
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