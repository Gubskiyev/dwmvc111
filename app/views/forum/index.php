<div class="card my-4">
    <h5 class="card-header"></h5>
    <div class="card-body">
        <div class="form-group">
            <table class="table table-hover">
                <tr>
                    <th width="70%">Форум</th>
                    <th width="30%">Последняя тема</th>
                    <th width="10%">Тем</th>
                </tr>

                <?php foreach($data['section'] as $section): ;?>
                    <tr>
                        <td>
                            <div>
                                <a href="/forum/section?id=<?=$section['id']?>">
                                     <?=$section['title']?>
                                </a>
                            </div>
                            <div>
                                <small><?=$section['desc']?></small>
                            </div>
                        </td>
                        <td>
                            <?=$data['lastThread'][$section['id']]['title']?> - <a href="/user/info?id=<?=$data['lastThread'][$section['id']]['user_id']?>"><?=$data['lastThread'][$section['id']]['user']?></a>
                        </td>
                        <td align="center">
                            <?=$data['count'][$section['id']]?>
                        </td>
                    </tr>
                <?php endforeach ;?>
            </table>
        </div>
    </div>
</div>

