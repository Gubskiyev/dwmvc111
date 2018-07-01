
<div class="map">
<img class="mapjpg" src="../img/map.jpg"><br>
<?php
foreach ($data as $map) {

    echo "<img class='sector' src='../img/s.gif' title='"."[".$map['x'].$map['y']."]"." : ".$map['name']."'>";
    if($map['y'] == 7) {
        echo "<br>";
    }
}
?>
</div>

<div>
    <table>
        <tr>
            <th width="300px">
                Наименование
            </th>
            <th width="100px">
                $
            </th>
            <th>
                Владелец
            </th>
        </tr>
        <?php foreach($data2 as $realty): ;?>
        <tr>
            <td>
                <a href="/realty/info?id=<?=$realty['id']?>"><?=$realty['title']?></a>
            </td>
            <td>
                <?=$realty['price']?>
            </td>
            <td>
                <a href="/user/info?id=<?=$realty['owner_id']?>"><?=$realty['owner_name']?></a>
            </td>
        </tr>
        <?php endforeach;?>
    </table>
</div>
