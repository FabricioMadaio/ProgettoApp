<?php

// If you are not using Composer (recommended)
require("php/sendgrid-php/sendgrid-php.php");

$from = new SendGrid\Email(null, "test@example.com");
$subject = "Hello World from the SendGrid PHP Library!";
$to = new SendGrid\Email(null, "the_player92@hotmail.it");
$content = new SendGrid\Content("text/plain", "Hello, Email!");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = "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";
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
echo $response->headers();
echo $response->body();