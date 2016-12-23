<div class="transfer">
    <table width="40%">
        <?php foreach($data as $log): ;?>
        <tr>
            <td><?=$log['date']?>:</td>
            <td><b><?=$log['sender']?></b> передал <b><?=$log['money']?></b> в пользу <?=$log['receiver']?>: "<?=$log['text']?>"</td>

        </tr>

        <?php endforeach; ?>
    </table>
</div>