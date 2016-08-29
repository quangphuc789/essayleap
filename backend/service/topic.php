<?php
require('adhoc.php');
require('../db/test.php');
require('../db/sql.php');

if (isset($_GET['cat']) && $_GET['cat']=='all') {
    $sql = new Sql();
    $topics = $sql->query("SELECT * FROM topic");
    send($topics);
}