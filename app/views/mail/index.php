<div id="mail">
    <table border="1" width="40%" align="center">
        <tr>
            <th width="20%">От</th>
            <th width="15%">Дата</th>
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
            <td>
                <a href="/mail/read?sms_id=<?=$mail['id']?>"><?=$mail['title']?></a>
            </td>
        </tr>
        <?php endforeach ;?>
    </table>
</div>