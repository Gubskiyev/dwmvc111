<?php
class ModelMap extends Model {

    public function getAllSectors() {
        $data = "SELECT `x`,`y`,`name` FROM `map`";
        $data = $this->select($data);
        return $data;
    }
}