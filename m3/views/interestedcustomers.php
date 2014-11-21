<!DOCTYPE html>

<?php
include 'navbar.php';
require_once ("../controllers/interest_controller.php");
require_once ("../models/user_model.php");
require_once '../models/listing_model.php';
require_once '../controllers/listings_controller.php';
require_once '../controllers/interest_controller.php';
$value = $_GET['id'];

$interest_controller = new interest_controller();
$customerSet = $interest_controller->getInterestedCustomers($value);

    echo "<div class=\"alert alert-success\" style=\"text-align:center\"><STRONG>";
    echo "Number of customers interested  in this property : ".sizeof($customerSet);
    echo "</STRONG></div>";

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
        echo "<div class='results'>
        <table class='table table-striped table-bordered table-hover' style='width:80%;text-align: center;' align='center'>
        <thead>
        <tr>
        <th>UserName</th>
        <th>E-mail</th>
        <th>Date Contacted</th>
        </tr></thead>";
        
        //echo sizeof($customerSet);
        foreach((array)$customerSet as $userData) 
        {       
            echo "<tbody><tr>";
            echo "<td>" . $userData->getUserName() . "</td>";
            echo "<td><a href='mailto:" . $userData->getUserEmail() . "'?Subject=Greetings%20from%20Prime%20Estate>". $userData->getUserEmail() . "</td>";
            echo "<td>" . $userData->getContactDate() . "</td>";
//            echo "<td>" . "11/5/2014" . "</td>";
        }
        
        echo "</tbody></table></div>";
        ?>
    </body>
</html>
