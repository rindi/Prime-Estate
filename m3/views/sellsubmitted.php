<?php
require_once '../controllers/users_controller.php';
require_once '../controllers/leads_controller.php';
require_once '../models/user_model.php';
require_once '../models/lead_model.php';

$input['firstname'] = $_POST['firstname'];
$input['lastname'] = $_POST['lastname'];
$input['phone'] = $_POST['phone'];
$input['email'] = $_POST['email'];

$user = new lead_model($input);
$lead_controller = new leads_controller();
$lead_controller->addLead($user);

echo "Thank you for contacting us ". $user->getFirstname() .", we will get in touch with you soon!";
?>

<!--<script>
window.location = 'http://sfsuswe.com/~f14g03/index.php';
</script>-->