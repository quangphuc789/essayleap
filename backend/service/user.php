<?php
require('adhoc.php');
require('../db/sql.php');

// Login
if (isset($_POST['email']) && isset($_POST['password'])) {
    $sql = new Sql();
    // send($_POST['email']);
    $obj = $sql->query("SELECT password FROM user WHERE email = 'quangphuc789@gmail.com'");
    if (count($obj) > 0) {
        $hashpw = $obj[0]['password'];

        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        send(1);
    } else {
        send(0);
    }
}