<?php
require('backend/modules/esmemailer.php');

$mail = new ESMEMailer();
$mail->send(
array(
    'to_email' => 'daitrang.vietnam@gmail.com',
    'msg' => "Hello from ESME, you logged into ".$_SERVER['HTTP_HOST'],
    'subject' => 'Test Email From ESME',
    'from_title' => 'Hi, ESME here!',
    )
);