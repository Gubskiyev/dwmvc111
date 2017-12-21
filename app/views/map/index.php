
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
