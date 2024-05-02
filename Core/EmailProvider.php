<?php

namespace Core;

use PHPMailer\PHPMailer\PHPMailer;

class EmailProvider
{
  private $mail;

  public function __construct()
  {
    $this->mail = new PHPMailer();
    $this->mail->isSMTP();
    $this->mail->Host = $_ENV['SMTP_HOST'];
    $this->mail->SMTPAuth = true;
    $this->mail->Port = $_ENV['SMTP_PORT'];
    $this->mail->Username = $_ENV['SMTP_USERNAME'];
    $this->mail->Password = $_ENV['SMTP_PASSWORD'];
    $this->mail->addAddress($_ENV['FEEDBACK_EMAIL_RECIPIENT'], 'NoteSync');
    $this->mail->isHTML(true);
    $this->mail->CharSet = 'UTF-8';
  }

  public function sendEmail($email, $name, $body)
  {
    $this->mail->setFrom($email, $name);
    $this->mail->Subject = 'Feedback da plataforma NoteSync';
    $this->mail->Body = $body;
    $this->mail->send();
  }
}