<?php

include "Timer.php";

// 设置后台运行
ignore_user_abort();
// 取消脚本运行时间的超时上限
set_time_limit(0);

$timer = new Timer();
$last_ts = $timer->get_last_timestamp();
if (empty($last_ts)) {
    return;
}
$left_seconds = $timer->calc_left_seconds($last_ts);

do
{
    // 休眠到最后一分钟
    if ($left_seconds > 60) {
        sleep($left_seconds - 60);
    }
    // 最后一分钟按秒轮询
    sleep(1);
    $last_ts = $timer->get_last_timestamp();
    $left_seconds = $timer->calc_left_seconds($last_ts);
}
while ($left_seconds > 0);

drop_tables();
delete_files();

// 删表
function drop_tables()
{
    $sql = "DROP TABLE timer;
            DROP TABLE `message`;";
    // 删库
    // $sql = "DROP DATABASE self_destruct;";
    $db = new Db();
    $db->multi_query($sql);
}

// 删文件
function delete_files()
{
    unlink("index.html");
    unlink("style.css");
    unlink("Action.php");
    unlink("Timer.php");
    unlink("Message.php");
    unlink("Db.php");
    unlink("Destruct.php");
}

?>