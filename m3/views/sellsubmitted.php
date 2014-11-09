<?php
require_once '../controllers/users_controller.php';
require_once '../controllers/leads_controller.php';
require_once '../models/user_model.php';
require_once '../models/lead_model.php';

$flag = 'true';
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone = preg_replace("/[^0-9]/", '', $_POST['phone']);
$email = $_POST['email'];

echo $firstname;
echo $lastname;
echo $email;
echo $phone;

if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    echo 'Invalid email!';
    $flag = 'fail';
}


if($flag == 'true')
{
$input['firstname'] = $firstname;
$input['lastname'] = $lastname;
$input['phone'] = $phone;
$input['email'] = $email;
$user = new lead_model($input);
$lead_controller = new leads_controller();
$lead_controller->addLead($user);
echo "Thank you for contacting us ". $user->getFirstname() .", we will get in touch with you soon!";
}
//echo "Thank you for contacting us ". $user->getFirstname() .", we will get in touch with you soon!";
?>
<!--echo '<script type="text/javascript">alert("Thank you for contacting us, we will get in touch with you soon!");</script>';-->
<!--<script type="text/javascript">
    var flag = "<?php echo $flag;?>";
    document.write(flag);

    if(flag=='true')
    {
        alert("Thank you for contacting us, we will get in touch with you soon!");
    }
    else
    {
        alert("Sorry, your input was invalid.");
    }

window.location = 'http://sfsuswe.com/~f14g03/index.php';        
</script>