<?php
// Set SMTP settings
ini_set('SMTP', 'smtp.gmail.com');
ini_set('smtp_port', 587);

// Enable TLS encryption
ini_set('smtp_crypto', 'tls');

// Set email headers
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: atheahisuan36@gmail.com" . "\r\n";

// Recipient email address
$to = "recipient@example.com";

// Email subject and message
$subject = "Hello";
$message = "This is a test email.";

// Send the email
$mailSent = mail($to, $subject, $message, $headers);

// Check if the email was sent successfully
if ($mailSent) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send email.";
}
?>
