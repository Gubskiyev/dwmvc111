<?php
class ModelMail extends Model {
    public function getMailByUser($login) {
        $data = "SELECT * FROM `mail` WHERE `reciever` = '$login'";
        $data = $this->select($data);
        return $data;
    }

    public function getInboxMailBySmsID($sms_id) {
        $data = "SELECT * FROM `mail` WHERE `id` = '$sms_id'";
        $data = $this->select($data);
        return $data;
    }
}