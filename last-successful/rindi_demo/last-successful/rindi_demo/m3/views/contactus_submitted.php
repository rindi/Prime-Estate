<?php
include('Mail.php');
/*
@(#)File:           Sell Submitted
@(#)Purpose:        User Submit Lead Confirmation
@(#)Author:         PrimeEstate
@(#)Product:        PrimeEstate Website 2014
*/


$firstname = $_POST['InputName'];
$message = $_POST['InputMessage'];
$email = $_POST['InputEmail'];

$to      = 'tojonol@gmail.com';
$subject = 'the subject';

$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

@mail($to, $subject, $message, $headers);



?>
<script type="text/javascript">

    alert("Thank you for contacting us, we will get in touch with you soon!");
   
window.location = 'http://sfsuswe.com/~f14g03/index.php';
</script>