<?php

/**
 * Model SendingMailModel will send the mail using SMTP
 */
class SendingMailModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /**
     * This function creates the SMTP connection and sends the mail using MAILGUN
     * @param $emailto
     * @param $subject
     * @param $mailbody
     * @return string
     * @throws phpmailerException
     */
    public function sendUsingSMTP($emailto,$subject,$mailbody)
    {
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = MAILGUN_HOST;                     // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = MAILGUN_USERNAME;   // SMTP username
        $mail->Password = MAILGUN_PASSWORD;                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable encryption, only 'tls' is accepted
        $mail-> Port = 587;
        $mail->From = MAILGUN_FROMADDRESS;
        $mail->FromName = MAILGUN_FROMNAME;
        $mail->addAddress($emailto);                 // Add a recipient
        $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
        $mail->Subject = $subject;
        $mail->Body    = $mailbody;

        if(!$mail->send()) {
            return 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            return 'Message has been sent';
        }

    }


}
?>