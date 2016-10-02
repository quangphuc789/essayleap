<?php
require('adhoc.php');
require('../db/sql.php');

if (isset($_GET['cat']) && $_GET['cat']=='all') {
    $sql = new Sql();
    $topics = $sql->query("SELECT * FROM topic");
    send($topics);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = new Sql();
    $topic = $sql->query("SELECT * FROM topic WHERE id = $id");
    $essay = $sql->query("SELECT * FROM essay WHERE topic_id = $id");
    $array = array(
        'topic' => $topic,
        'essay' => $essay
        );
    send($array);
}

if (isset($_GET['submit'])) {
    require('../modules/logger.php');
    if (isLogged()) {
        $data = $_POST;
        $content = $data['content'];
        $id = $data['id'];
        $time = time();
        $author = $GLOBALS['id'];

        $sql = new Sql();
        $res = $sql->query("INSERT into essay 
            values ('', '$id', '$content', '', '', '$time', '0', '0', '$author', '')");
        send($res);
    } else {
        send("please log in");
    }
        
}