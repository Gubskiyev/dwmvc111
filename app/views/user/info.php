<table align="center">
    <tr>
        <td>
        </td>
    </tr>
</table>
<br>
<table border="1" align="center" width="30%">
    <?php foreach($data as $user): ;?>
        <tr>
            <td>Логин</td>
            <td><?=$user['login']?></td>
        </tr>

    <?php endforeach ;?>
</table>