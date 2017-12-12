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

    public function getInboxMailBySmsID($sms_id,$receiver) {
        $data = "UPDATE `mail` SET `new` = 0 WHERE `id` = '$sms_id'";
        $this->update($data);
        $data = "UPDATE `users` SET `mailstatus` = 0 WHERE `login` = '$receiver'";
        $this->update($data);
        $data = "SELECT * FROM `mail` WHERE `id` = '$sms_id'";
        $data = $this->select($data);
        return $data;
    }

    public function addNewMail($sender,$receiver,$date,$title,$text) {
        $data = "UPDATE `users` SET `mailstatus` = 1 WHERE `login` = '$receiver'";
        $this->update($data);
        $data = "INSERT INTO `mail` (`id`,`sender`,`receiver`,`date`,`title`,`text`,`new`) VALUES ('NULL','$sender','$receiver','$date','$title','$text',1)";
        $this->query($data);
    }

    public function getUserData($login) {
        $data = "SELECT * FROM `users` WHERE `login` = '$login'";
        $data = $this->select($data);
        return $data;
    }

}