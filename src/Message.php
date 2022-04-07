<?php

include_once "Db.php";

/**
 * 消息
 */
class Message
{
    /**
     * 随机获取一条消息
     */
    public function get_random_msg()
    {
        $sql = "SELECT * FROM `message`
                WHERE id >= ((SELECT MAX(id) FROM `message`) - (SELECT MIN(id) FROM `message`)) * RAND() + (SELECT MIN(id) FROM `message`)
                LIMIT 1";
        $db = new Db();
        $resource = $db->query($sql);
        if ($resource->num_rows == 0) {
            return null;
        }
        $row = $resource->fetch_assoc();
        return $row["message"];
    }

    /**
     * 保存一条消息
     */
    public function save_msg($message)
    {
        $sql = "INSERT INTO `message` VALUES(null, '" . $message . "', null);";
        $db = new Db();
        $db->query($sql);
    }
}

?>