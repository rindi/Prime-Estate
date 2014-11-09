<!DOCTYPE html>

<?php
include 'navbar.php';
require_once ("../controllers/interest_controller.php");
require_once ("../models/user_model.php");
$value = $_SESSION['listing_number'];
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
        require_once '../models/listing_model.php';
        require_once '../controllers/listings_controller.php';
        require_once '../controllers/realtor_controller.php';
     
        echo "<div class='results'>
        <table class='table' style='width:90%' border='1' align='center'>
        <thead>
        <tr>
        <th>UserName</th>
        <th>E-mail</th>
        <th>Date Contacted</th>
        </tr></thead>";
        
        $realtor_controller = new interest_controller();
        $listingSet = $realtor_controller->getInterestedCustomers($value);

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
