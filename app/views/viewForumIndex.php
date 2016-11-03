<table border="1" width="70%" align="center">
    <tr>
        <th width="70%">Форум</th>
        <th width="20%">Последняя тема</th>
        <th width="10%">Всего</th>
    </tr>
    <?php foreach($data as $section): ;?>
        <tr>
            <td>
                <div>
                    <a href="/forum/section?id=<?=$section['id']?>">
                        <?=$section['title']?>
                    </a>
                </div>
                <div>
                    <small><?=$section['description']?></small>
                </div>
            </td>
            <td>
                Последние сообщения
            </td>
            <td align="center">
				
            </td>
        </tr>
    <?php endforeach ;?>
</table>