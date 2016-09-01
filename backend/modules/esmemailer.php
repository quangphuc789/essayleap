<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once $_SERVER['DOCUMENT_ROOT'].'/esme/backend/vendor/swiftmailer/lib/swift_required.php';
// require('../vendor/test33.php');
// require("../test44.php");
// echo $_SERVER['DOCUMENT_ROOT'];
// require('../db/sql.php');

class ESMEMailer {
    private $from_email;
    private $password;
    private $default_from_title;
    private $default_subject;
    private $ignored_domain;

    /**
     * Constructor
     * @param [type] $data [description]
     */
    public function __construct() {
        $this->from_email = 'esmewrite@gmail.com';
        $this->password = 'esmewrite2016';
        $this->default_from_title = 'ESME Support';
        $this->default_subject = 'ESME Message';
        $this->ignored_domain = array(
            'pm.dev',
            // 'stage.powerme.com.sg'
            );
    }

    /**
     * Public method to send email
     * @return boolean
     *
     * Sample input
     * $data = array(
     *   'to_email' => 'AAA@BBB.com.sg',
     *   'to_id' => 'The id to receive email if to_email not provided'
     *   'msg' => 'Sample Message',
     *   'subject' => 'Sample Subject',
     *   'from_title' => 'Sample From Title that appears in receiver's inbox'
     * );
     */
    public function send($data) {
        $msg = $data['msg'];

        if (isset($data['to_email'])) {
            $to_email = $data['to_email'];
        } elseif (isset($data['to_id'])) {
            $profileObj = Yii::app()->db->createCommand()
                   ->select('to_email')
                   ->from('profile')
                   ->where('user_id='.$data['to_id'])
                   ->queryRow();

            $to_email = ($profileObj!=null) ? $profileObj['to_email'] : '';
        } else {
            return false;
        }

        $subject = isset($data['subject']) ? $data['subject'] : $this->default_subject;
        $from_title = isset($data['from_title']) ? $data['from_title'] : $this->default_from_title;

        $message = Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom(array($this->from_email => $from_title))
            ->setTo(array($to_email))
            ->setBody($msg)
            ->addPart($msg, 'text/html');

        if (isset($data['bcc'])) {
            $message->setBcc($data['bcc']);
        }

        $headers = $message->getHeaders();
        $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
            ->setUsername($this->from_email)
            ->setPassword($this->password);

        $mailer = Swift_Mailer::newInstance($transport);

        if (!in_array($_SERVER['HTTP_HOST'], $this->ignored_domain)) {
            $mailer->send($message);
            return true;
        } else {
            return false;
        }
    }
}