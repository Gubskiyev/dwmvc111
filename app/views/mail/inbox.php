
<div>
    <table align="center" width="40%">
        <tr align="center">
            <td>
                <a href="/mail/">Входящие сообщения</a>
            </td>
            <td>
                <a href="/mail/outbox">Исходящие сообщения</a>
            </td>
        </tr>
    </table>
</div>
<br>
<div class="mail">
    <table border="1" width="40%" align="center">
        <tr>
            <th width="15%">От</th>
            <th width="15%">Дата</th>
            <th width="5%">#</th>
            <th width="65%">Тема</th>
        </tr>
        <?php foreach($data as $mail): ;?>
        <tr>
            <td>
                <a href="/user/info?id="><?=$mail['sender']?></a>
            </td>
            <td>
                <?=$mail['date']?>
            </td>
            <td align="center">
                <input type="checkbox" name="check">
            </td>
            <td>
                <?php if($mail['new'] == 0) { ?>
                    <a href="/mail/read?id=<?=$mail['id']?>"><?=$mail['title']?></a>
                <?php }else {?>
                    <strong><a class="newmail" href="/mail/read?id=<?=$mail['id']?>"><?=$mail['title']?></a></strong>
                <?php } ?>
            </td>
        </tr>
        <?php endforeach ;?>
    </table>
</div>
<br>
<div class="mail buttons">
    <table border="1" width="40%" align="center">
        <tr>
            <td>
                <a href="/mail/new">Написать сообщение</a>
            </td>
            <td>
                Удалить сообщения
            </td>
            <td>
                Непрочитанные сообщения
            </td>
        </tr>
    </table>
</div>