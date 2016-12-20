<div class="nav">
    <a href="/forum/">Форум</a> -> 
	<a href="/forum/section?id=<?=$data2[0]['id']?>"><?=$data2[0]['title']?></a> -> 
	<?=$data[0]['title']?>
</div>
<table border="1" width="70%" align="center">
    <tr align="left">
        <th width="15%">Автор</th>
        <th width="80%">Тема: <?=$data[0]['title']?></th>
    </tr>
	
    <?php $n = 0 ;?>
    <?php foreach($data as $message): ;?>

        <?php $n++ ;?>
        <tr>
            <td valign="top" align="center">
                <p>
                    <a href="/user/info?id=<?=$message['user_id']?>"><?=$message['user']?></a>
                </p>
            </td>
            <td>
                <table width="100%">
                    <tr>
                        <td align="left"><small>[<?=$n?>]</small></td>
                        <td align="right"><small>Написано: <?=$message['date']?></small></td>
                    </tr>
                </table>
                <br>
                <?=nl2br(htmlentities($message['text']))?>
            </td>
        </tr>
    <?php endforeach ;?>
</table>
<br>
<?php
if(isset($_COOKIE['login'])){
    ?>
    <form action="/forum/postMessage/" method="post" name="mess">
        <table border="1" width="30%" align="center" >
            <tr>
                <th align="center">Новое сообщение</th>
            </tr>
            <tr>
                <td align="center"><textarea name="text" cols="72" rows="10" required></textarea></td>
            </tr>
            <tr>
                <td align="center"><input type="submit" value="Написать"></td>
                <input type="hidden" name="mid" value="<?=$_GET['tid']?>">
                <input type="hidden" name="fid" value="<?=$_GET['fid']?>">
                <input type="hidden" name="login" value="<?=$_COOKIE['login']?>">
            </tr>
        </table>
    </form>
<?php
}
?>
</div>