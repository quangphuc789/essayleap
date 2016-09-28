<?php
// require('../db/sql.php');
require_once $_SERVER['DOCUMENT_ROOT'].'/esme/backend/db/sql.php';
if (isset($_COOKIE['id'])) {
    $id = $_COOKIE['id'];
    $sql = new Sql();
    $objs = $sql->query("SELECT * FROM session WHERE id = '$id' LIMIT 1");
    if (count($objs) > 0) {
        $obj = $objs[0];
        $expiry = intval($obj['expiry']);
        if ($obj['expiry']-time() > 0) {
            $GLOBALS['name'] = 'Phuc2';
            require('userinfo.php');
        } else {
            require('login.php');
        }
    } else {
        require('login.php');
    }
} else {
    require('login.php');
}