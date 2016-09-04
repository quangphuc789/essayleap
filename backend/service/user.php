<?php
require('adhoc.php');
require('../db/sql.php');

// Login
if (isset($_GET['type']) && $_GET['type']=='login' && 
    isset($_POST['email']) && isset($_POST['password'])) {
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

// Sign up
if (isset($_GET['type']) && $_GET['type']=='signup' && isset($_POST['info'])) {
    $info = json_decode($_POST['info']);

    $lastname = $info->lastname[0];
    $firstname = $info->firstname[0];
    $email = $info->email[0];
    $country = $info->country[0];
    $dob = $info->dob[0];
    $language = $info->lastname[0];
    $password = md5($info->password[0]);

    $sql = new Sql();
    $obj = $sql->query("SELECT * FROM user WHERE email = '$email' LIMIT 1");
    if (count($obj) > 0) {
        send('existed');
    } else {
        // Create new user
        $sql->query("INSERT into user 
            values ('', '$email', '$password', '', '', '', '', '', '', '0', '$lastname', '$firstname', 'sda', '$language', '$country', '$dob', '', '', '')");
        send('ok');

        // Prepare email
        require('../modules/esmemailer.php');

        $mail = new ESMEMailer();
        $mail->send(
        array(
            'to_email' => $email,
            'msg' => "Hello from ESME, please verify your account by clicking this link",
            'subject' => 'ESME account activation',
            'from_title' => 'ESME',
            )
        );
    }
}