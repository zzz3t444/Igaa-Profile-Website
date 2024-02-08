<?php
$errors  = '';
$myemail = 'you@yoursite.com';
if (empty($_POST['subscribeemail'])) {
    $errors .= "\n Error: Required Field";
}

$subscribeemail = $_POST['subscribeemail'];

if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $subscribeemail)) {
    $errors .= "\n Error: Invalid Email Address";
}

if (empty($errors)) {
    $to                     = $myemail;
    $subscribeemail_subject = "Newsletter Subscription";
    $subscribeemail_body    = "Newsletter Enquiry. Details are given below.\n Email: $subscribeemail";
    $headers                = "From: $subscribeemail";
    
    mail($to, $subscribeemail_subject, $subscribeemail_body, $headers);
}
?>