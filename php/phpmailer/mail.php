<?php

require("../php/sendgrid-php/sendgrid-php.php");

class Mail
{
    public function subject($subject)
    {
        $this->Subject = $subject;
    }

    public function body($body)
    {
        $this->Body = new SendGrid\Content("text/html", $body);
    }
	
	 public function setFrom($mail,$name)
    {
        $this->From = new SendGrid\Email($name, $mail);
		
    }
	
	 public function addAddress($to)
    {
        $this->To = new SendGrid\Email(null, $to);
		
	}
	
    public function send()
    {
		$mail = new SendGrid\Mail($this->From, $this->Subject, $this->To, $this->Body);

		$apiKey = "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";
		$sg = new \SendGrid($apiKey);

		$response = $sg->client->mail()->send()->post($mail);

    }
}
