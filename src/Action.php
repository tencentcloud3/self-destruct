<?php

include "Timer.php";
include "Message.php";

// 处理Web请求: Action.php?action=getLeftTime
if (isset($_GET['action']) && $_GET['action'] === 'getLeftTime') {
    header('Content-Type: application/json; charset=utf-8');
	$timer = new Timer();
    $last_ts = $timer->get_last_timestamp();
    if (empty($last_ts)) {
        exit("{}");
    }
    $left_ts = $timer->calc_left_seconds($last_ts);
    exit("{"."\"lastTs\":".$last_ts.",\"leftTs\":".$left_ts."}");
}

// 处理Web请求: Action.php?action=sendMsg
if (isset($_POST['action']) && $_POST['action'] === 'sendMsg') {
    $msgText = $_POST['msg'];
    $msg = new Message();
    $msg->save_msg($msgText);
	$timer = new Timer();
    exit($timer->reset_timestamp());
}

// 处理Web请求: Action.php?action=beginCountdown
if (isset($_POST['action']) && $_POST['action'] === 'beginCountdown') {
	$timer = new Timer();
    exit($timer->begin_countdown());
}

// 处理Web请求: Action.php?action=getMsg
if (isset($_POST['action']) && $_POST['action'] === 'getMsg') {
	$msg = new Message();
    exit($msg->get_random_msg());
}

?>