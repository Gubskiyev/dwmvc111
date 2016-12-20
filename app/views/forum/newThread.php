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

</form>