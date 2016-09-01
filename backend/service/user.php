<?php
require('adhoc.php');
require('../db/sql.php');

// Login
if (isset($_POST['email']) && isset($_POST['password'])) {
    $sql = new Sql();
    // send($_POST['email']);
    $obj = $sql->query("SELECT * FROM user WHERE email = 'quangphuc789@gmail.com' LIMIT 1");
    if (count($obj) > 0) {
        $hashpw = $obj[0]['password'];
        $id = $obj[0]['id'];
        // echo md5($_POST['password']);
        if (md5($_POST['password']) == $hashpw) {
            // Set cookie
            $expiry = time() + (86400 * 30);
            setcookie('id', $id, $expiry, "/"); // 86400 = 1 day

            // Set session
            $sql->query("INSERT into session values ('$id', '$expiry', '1') 
                ON DUPLICATE KEY UPDATE expiry = '$expiry'");

            // Send yes
            send(1);
        } else {
            send(2);
        }
    } else {
        send(2);
    }
}