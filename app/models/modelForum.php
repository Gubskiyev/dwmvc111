<?php
class ModelForum extends Model {

    public function getAllForums() {
        $sections = $this->select("SELECT COUNT(*) FROM `section`");
        $sections = $sections[0]["COUNT(*)"];

        for($i = 1; $i <= $sections; $i++) {
            $sql = "SELECT COUNT(*) FROM `threads` WHERE `fid` = '$i'";
            $total[$i] = $this->select($sql);

            foreach($total[$i] as $c) {
                $count[] = $c["COUNT(*)"];
            }
        }
        //$data = [];
        $data['count'] = $count;
        $data['section'] = $this->select("SELECT * FROM `section`");
        return $data;
    }

    public function getThreadsBySection($section) {
        $sql = "SELECT * FROM `threads` WHERE `fid` = '$section' ORDER BY `id` DESC";
        return $this->select($sql);
    }

    public function getThreadByID($fid,$tid) {
        $sql = "SELECT * FROM `threads` WHERE `id` = '$tid' OR `mid` = '$tid'";
		return $this->select($sql);
    }

    public function addNewThread($fid,$title,$text,$user,$user_id,$date) {
		$sql = "INSERT INTO `threads` (`id`,`mid`,`fid`,`type`,`title`,`text`,`user`,`user_id`,`date`) VALUES ('NULL','0','$fid','topic','$title','$text','$user','$user_id','$date')";
        $this->query($sql);
    }

    public function addNewMessage($mid,$text,$user,$user_id,$date) {
        $sql = "INSERT INTO `threads` (`id`,`mid`,`fid`,`type`,`title`,`text`,`user`,`user_id`,`date`) VALUES ('NULL','$mid','0','topic','','$text','$user','$user_id','$date')";
		$this->query($sql);
    }

	public function getForumByID($id) {
        return $this->select("SELECT * FROM `section` WHERE `id` = '$id'");
    }

    public function getLastThread($id) {

    }



    public function getUserData($login) {
        $sql = "SELECT `id`,`login` FROM `users` WHERE `login` = '$login'";
        return $this->select($sql);
    }


    public function getCountMessages($id) {
        $data = $this->select("SELECT * FROM `threads` WHERE `mid` = '".$id."'");
        $count = count($data);
        $count++;
        return $count;
    }

    public function getCountThreads($id) {
        $data = $this->select("SELECT * FROM `threads` WHERE `fid` = '".$id."'");
        $count = count($data);
        return $count;
    }

}