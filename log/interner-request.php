<?php

$admin_email = "admin@example.com";
$subject = "New Internship Request";
$message = "A new internship request has been submitted. Please check the admin dashboard for details.";
$headers = "From: internship@example.com";

mail($admin_email, $subject, $message, $headers);
?>
