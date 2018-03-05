</div>

<?php if(!empty($_GET['fid'])) { ?>
    <div class="card my-4">
        <h5 class="card-header">Новая тема:</h5>
        <div class="card-body">
            <form action="/forum/postThread" method="post">
                <div class="form-group">
                    <!--<span class="form-control">От: <?= $_COOKIE['login'] ?></span>-->
                    <input class="form-control" type="text" size="68" name="title" width="70" placeholder="Тема"
                           required>
                    <textarea class="form-control" name="text" rows="6" placeholder="Сообщение" required></textarea>
                    <input type="hidden" name="fid" value="<?= $_GET['fid'] ?>">
                    <input type="hidden" name="login" value="<?= $_COOKIE['login'] ?>">
                </div>
                <button type="submit" class="btn btn-primary" value="Создать" name="submit">Создать</button>
            </form>
        </div>
    </div>
    <?php
} else {
    $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
    header('HTTP/1.1 404 Not Found');
    header("Status: 404 Not Found");
    header('Location:'.$host.'404');
}

?>
<!--
<form action="/forum/postThread" method="post">
    <table border="1" width="28%" align="center">
        <tr>
            <th width="15%">Новая тема</th>
        </tr>
        <tr>
            <td>
                От: <?=$_COOKIE['login']?>
            </td>
        </tr>
        <tr>
            <td align="center">
                <input type="text" size="68" name="title" width="70" placeholder="Тема" required>
            </td>
        </tr>
        <tr>
            <td align="center">
                <textarea name="text" cols="70" rows="10" placeholder="Сообщение" required></textarea>
            </td>
        </tr>
        <tr>
            <td align="center"><input type="submit" value="Создать" name="submit"></td>
        </tr>
    </table>
    <input type="hidden" name="fid" value="<?=$_GET['fid']?>">
    <input type="hidden" name="login" value="<?=$_COOKIE['login']?>">

</form>-->