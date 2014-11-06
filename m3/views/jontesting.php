<?php
//include 'views/navbar.php';
require_once ("../controllers/realtor_controller.php");
require_once ("../controllers/profile_controller.php");
require_once ("../models/customer_model.php");

$value = 54;
session_start();
$_SESSION['listing_number'] = $value;
$dbRow['bedrooms'] = 4;
$dbRow['bathrooms'] = 2;
$dbRow['pricemin'] = 10000;
$dbRow['pricemax'] = 10001;
$dbRow['zip'] = 94112;
$dbRow['personalinformation'] = "imma nice guy like my tie?";
$dbRow['userid'] = 42;
$mycustomerPREFS = new customer_model($dbRow);
$userController = new users_controller();
$custController = new profile_controller();
//$customerid = 225;
$registration['username'] = "Mochahhhh"; 
$registration['password'] = "lol";
$registration['type'] = "customer";
$registration['email'] = "ohyes@asmdoann.com";
$newUser = new user_model($registration);
//$user_contr->addUser($newUser);
$userController->addUser($newUser);
$custController->newProfile($customerid);
//$custController->getProfile($mycustomerPREFS);
?>
<html>
    <head>
        <title> Prime Estate </title>
    </head>
    <body>
        <h1 align="center">
            Welcome to Prime Estate.
        </h1>
        <a href='interestedcustomers.php'>click</a>
        </input>
        </form>
    </body>
</html>
<?php
//include 'views/data_usage.php';
?>