<?php
class ModelUser extends Model {
    public function getCountUser($login) {
        $data = "SELECT COUNT(*) FROM `users` WHERE `login` = '$login'";
        $data = $this->select($data);
        return $data[0]["COUNT(*)"];
    }

    public function getUser($login) {
        $data = $this->select("SELECT * FROM `users` WHERE `login` = '$login'");
        return $data[0];
    }

    public function getUserData($login) {
        $data = $this->select("SELECT * FROM `users` WHERE `login` = '$login'");
        return $data;
    }

    public function getUserDataByID($id) {
        $data = $this->select("SELECT * FROM `users` WHERE `id` = '$id'");
        return $data;
    }

    public function userAdd($login,$pass) {
        $sql = "INSERT INTO `users` (`id`,`login`,`pass`) VALUES ('NULL','".$login."','".$pass."')";
        return $this->insert($sql);
    }


}