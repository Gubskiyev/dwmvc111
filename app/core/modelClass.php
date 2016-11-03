<?php
class Model {

    public $config;
    public $mysqli;

    public function __construct() {
        $this->config = new Config();
        $this->mysqli = new mysqli(Config::DBHOST,Config::DBUSER,Config::DBPASS,Config::DBNAME);
        $this->mysqli->query("SET NAMES 'utf8'");
    }

    public function query($query) {
        return $this->mysqli->query($query);
    }

    public function select($query) {
        $res = $this->query($query);
        $ret = [];
        while($row = mysqli_fetch_assoc($res)) {
            $ret[] = $row;
        }
        return $ret;
    }

    public function insert($query) {
        return $this->query($query);
    }

    public function update($query) {
        return $this->query($query);
    }

    public function getSkill() {
        return $this->query("SELECT * FROM `skill`");
    }

}