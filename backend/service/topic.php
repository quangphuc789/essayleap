<?php
require('adhoc.php');
require('../db/test.php');
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
    echo serialize($array);
}