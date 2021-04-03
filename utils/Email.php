<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

include_once "../views/email/resetPasswordEmail.php";
include_once "../views/email/bookingTicketEmail.php";

class Email
{

    public $mail;

    public function __construct($config)
    {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true;
        $this->mail->Host = $config['host'];
        $this->mail->Username = $config['user'];
        $this->mail->Password = $config['password'];
        $this->mail->Port = $config['port'];
        $this->mail->SMTPSecure = "tls";
    }

    public function sendEmail($email, $subject, $options, $callbackHTML)
    {
        try {
            $this->mail->setFrom('utrancerailway@gmail.com', 'Admin');
            $this->mail->addAddress($email);

            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $callbackHTML($options);
            // if (isset($options['message'])) {
            //     $this->mail->AltBody = $options['message'];
            // }
            if ($callbackHTML === 'renderTicketInvoiceEmail') {
                $imgPath = dirname(__DIR__, 1) . '/public/img/QR/' . $options['hash'] . '.png';
                $this->mail->AddEmbeddedImage($imgPath, 'qr', $options['hash'] . '.png');
            }
            $this->mail->send();
        } catch (Execption $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    public function sendRestPasswordEmail($email, $subject, $options = null)
    {
        $this->sendEmail($email, $subject, $options, 'renderResetPassword');
    }

    public function sendTicket($email, $subject, $options = null)
    {
        $this->sendEmail($email, $subject, $options, 'renderTicketInvoiceEmail');
    }

}
