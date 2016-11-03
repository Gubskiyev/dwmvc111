<div id="main">
    <div id="left-menu">
        <div class="head-left">
            Информация
        </div>
        <?php foreach($data as $user): ;?>
        <div class="body-left">
            <div id="login">
                <a href="info/<?=$user['id']?>">
                    <?=$user['login']?>
                </a>
            </div>
            <div id="money">
                Наличность: <b>$<?=$user['money']?></b>
            </div>
            <div id="hp">
                Здоровье: <?=$hpMin?>/<?=$hpMax?>
            </div>

            <br>

            <div id="lvl">
                <div id="title">
                    <b>Уровни:</b>
                </div>
                <div id="blvl">
                    Боевой: <?=$user['blvl']?> (<?=$user['bexp']?>)
                </div>
                <div id="elvl">
                    Экономический: <?=$user['elvl']?> (<?=$user['eexp']?>)
                </div>
                <div id="plvl">
                    Производственный: <?=$user['elvl']?> (<?=$user['eexp']?>)
                </div>

                <hr>

                <div id="raion">
                    <div id="street">
                        Район: [M] DownTown
                    </div>
                    <div id="status">
                        Статус: <?=$user['status']?>
                    </div>
                </div>

                <hr>

                <div id="char">
                    <div id="str">
                        Сила: <?=$user['strength']?>
                    </div>
                    <div id="agl">
                        Меткость: <?=$user['accuracy']?>
                    </div>
                    <div id="life">
                        Здоровье: <?=$user['health']?>
                    </div>
                    <div id="end">
                        Выносливость: <?=$user['endurance']?>
                    </div>
                </div>
                <br>
                <div id="skill">
                    <table border="1">

                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="right-menu">
        <div id="menu">

        </div>
    </div>
</div>
<?php endforeach; ?>