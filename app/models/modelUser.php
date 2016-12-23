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

    public function userSendMoney($sender,$receiver,$sendMoney,$text,$date) {
        $moneySender = "SELECT `money` FROM `users` WHERE `login` = '$sender'";
        $moneyReceiver = "SELECT `money` FROM `users` WHERE `login` = '$receiver'";
        $moneySender = $this->select($moneySender);
        $moneyReceiver = $this->select($moneyReceiver);

        $moneySender = $moneySender[0]['money'] - $sendMoney;
        $moneyReceiver = $moneyReceiver[0]['money'] + $sendMoney;

        $moneyUpdSender = "UPDATE `users` SET `money` = '$moneySender' WHERE `login` = '$sender'";
        $this->update($moneyUpdSender);
        $moneyUpdReceiver = "UPDATE `users` SET `money` = '$moneyReceiver' WHERE `login` = '$receiver'";
        $this->update($moneyUpdReceiver);

        $writeLog = "INSERT INTO `log_transfer` (`id`,`sender`,`receiver`,`text`,`date`,`money`,`item`) VALUES ('NULL','$sender','$receiver','$text','$date','$sendMoney','NULL')";
        $this->insert($writeLog);
    }
}