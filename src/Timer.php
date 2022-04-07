<?php

include_once "Db.php";

/**
 * 计时器
 */
class Timer
{
    /**
     * 最长留存时间
     */
    private $life_time = 86400;

    /**
     * 开始倒计时
     */
    public function begin_countdown()
    {
        $sql = "INSERT INTO timer VALUES(CURRENT_TIMESTAMP());";
        $db = new Db();
        $db->query($sql);
    }

    /**
     * 获取最近更新时间戳
     */
    public function get_last_timestamp()
    {
        $sql = "SELECT UNIX_TIMESTAMP(last_ts) AS last_ts FROM timer";
        $db = new Db();
        $resource = $db->query($sql);
        if ($resource->num_rows == 0) {
            return null;
        }
        $row = $resource->fetch_row();
        return $row[0];
    }

    /**
     * 计算剩余时间（秒）
     */
    public function calc_left_seconds($last_ts)
    {
        $cur_ts = time();
        $left_time = $this->life_time - ($cur_ts - $last_ts);
        return $left_time;
    }

    /**
     * 重设时间戳
     */
    public function reset_timestamp()
    {
        $sql = "UPDATE timer SET last_ts = CURRENT_TIMESTAMP() LIMIT 1";
        $db = new Db();
        $db->query($sql);
        return $this->life_time;
    }
}
