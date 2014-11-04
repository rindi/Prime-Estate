<!DOCTYPE html>

<?php
include 'navbar.php';
require_once ("../controllers/customer_controller.php");
require_once ("../models/user_model.php");
session_start();
$value = $_SESSION['varname'];
?>

<html>
    <style>
        h2{
         padding-left:500px;   
        }
    </style>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <body>
        <h2> Interested Customers </h2>
        
        <?php
        require '../models/listing_model.php';
        require '../controllers/listings_controller.php';
     
        echo "<div class='results'>
        <table class='table' style='width:90%' border='1' align='center'>
        <thead>
        <tr>
        <th>UserName</th>
        <th>E-mail</th>
        <th>Date Contacted</th>
        </tr></thead>";
        
        $customer_controller = new customer_controller();
        $listingSet = $customer_controller->getCustomers($value);

        foreach((array)$listingSet as $userData) 
        {
            echo "<tbody><tr>";
            echo "<td>" . $userData->getUserName() . "</td>";
            echo "<td>" . $userData->getUserEmail() . "</td>";
            echo "<td>" . $userData->getContactDate() . "</td>";
//            echo "<td>" . "11/5/2014" . "</td>";
        }
        
        echo "</tbody></table></div>";
        ?>
    </body>
</html>
