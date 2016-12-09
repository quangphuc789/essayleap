<?php
require('adhoc.php');
require('../db/sql.php');

if (isset($_GET['type']) && $_GET['type']=='send') {
    require('../modules/logger.php');
    require('../modules/esmemailer.php');
    if (isLogged()) {
        $data = $_POST;
        $content = $data['content'];

        $mail = new ESMEMailer();
        $mail->send(
        array(
            'to_email' => 'quangphuc789@gmail.com',
            'msg' => $content,
            'subject' => 'School Mailer',
            'from_title' => 'School Mailer',
            )
        );

        send($data['content']);
    } else {
        send("please log in");
    }
}