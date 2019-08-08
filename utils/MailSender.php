<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class MailSender
{
	public static function sendMessage($email, $subject, $message)
	{
		$mail = new PHPMailer(true);
		try {
			//Server settings
			$mail->isSMTP();
			$mail->Host = 'smtp.mailtrap.io';
			$mail->SMTPAuth = true;
			$mail->Username = '8a9e12ba0abd65';
			$mail->Password = '9d33a703a4a791';
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;

			//Recipients
			$mail->setFrom('saganroman@example.com', 'WebDeveloper');
			$mail->addAddress($email);

			// Content
			$mail->isHTML(true);
			$mail->Subject = $subject;
			$mail->Body = $message;

			$mail->send();
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}

}
