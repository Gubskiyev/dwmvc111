<?php
class Model {

    public $config;
    public $mysqli;
    public $pdo;

    public function __construct() {
        $this->config = new Config();
        $this->mysqli = new mysqli(Config::DBHOST,Config::DBUSER,Config::DBPASS,Config::DBNAME);
        $this->mysqli->query("SET NAMES 'utf8'");
        /*
        try{
            $this->pdo = new PDO($this->config->dsn, $this->config->username, $this->config->password);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        */
    }

    public function query($query) {
        //$statement = $this->pdo->prepare($query);
        //$statement->execute(array($query));
        //var_dump($statement);die;
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

    public function delete($query) {
        return $this->query($query);
    }

}