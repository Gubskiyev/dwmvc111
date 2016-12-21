<?php
class ModelMail extends Model {
    public function getInboxMailByUser($login) {
        $data = "SELECT * FROM `mail` WHERE `receiver` = '$login' ORDER BY `id` DESC";
        $data = $this->select($data);
        return $data;
    }

    public function getOutboxMailByUser($login) {
        $data = "SELECT * FROM `mail` WHERE `sender` = '$login' ORDER BY `id` DESC";
        $data = $this->select($data);
        return $data;
    }

    public function getInboxMailBySmsID($sms_id) {
        $data = "SELECT * FROM `mail` WHERE `id` = '$sms_id'";
        $data = $this->select($data);
        return $data;
    }

    public function addNewMail($sender,$receiver,$date,$title,$text) {
        $data = "INSERT INTO `mail` (`id`,`sender`,`receiver`,`date`,`title`,`text`) VALUES ('NULL','$sender','$receiver','$date','$title','$text')";
        //var_dump($data);die;
        $this->query($data);
    }

    public function getUserData($login) {
        $data = "SELECT * FROM `users` WHERE `login` = '$login'";
        $data = $this->select($data);
        return $data;
    }
}