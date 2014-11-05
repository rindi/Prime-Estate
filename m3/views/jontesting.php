<?php
//include 'views/navbar.php';
require_once ("../controllers/customer_controller.php");
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
$custController = new customer_controller();
$custController->getProfile($mycustomerPREFS);
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