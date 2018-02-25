
<div class="navbar">
    <a href="/forum/">Форум</a> -> <?=$data2[0]['title']?>
</div>

<div class="card my-4">
    <h5 class="card-header"></h5>
    <div class="card-body">
        <div class="form-group">
            <table class="table table-hover">
                <tr>
                    <th width="55%">Темы</th>
                    <th width="10%">Автор</th>
                    <th width="15%">Дата</th>
                    <th width="5%">#</th>
                    <th width="15%">Последнее сообщение</th>
                </tr>
                <?php foreach($data as $section): ;?>
                    <tr>
                        <td><a href="/forum/message?fid=<?=$section['fid']?>&amp;tid=<?=$section['id']?>"><?=htmlentities($section['title'])?></a></td>
                        <td align="center">
                            <a href="/user/info?id=<?=$section['user_id']?>">
                                <?=$section['user']?>
                            </a>
                        </td>
                        <td align="center"><?=$section['date']?></td>
                        <td align="center">
                            <?=count($section['id'])?>
                        </td>
                        <td align="center"></td>
                    </tr>
                <?php endforeach ;?>
            </table>
        </div>
    </div>
</div>
<br>
<div>
    <a class="btn btn-success" href="/forum/newThread?fid=<?=$section['fid']?>">Новая тема</a>
</div>
