<!DOCTYPE html>

<?php
include 'navbar.php';
require_once ("../controllers/customer_controller.php");
session_start();
$value = $_SESSION['varname'];
//$value = $_GET['listing'];
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
<!--        <form style="text-align:center; margin: 0px auto" action="searchresults.php" method="POST">
       
        <input type="submit" class="btn btn-inverse" value="<?php echo $value;?>">
        </form>-->
        <h2> Interested Customers </h2>
        
        <?php
        require '../models/listing_model.php';
        require '../controllers/listings_controller.php';
     
        #echo $query;
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
//            echo "<td>" . $userData->getDate() . "</td>";
            echo "<td>" . "11/5/2014" . "</td>";
//            
//            $images = $listingData->getImages();
//            foreach((array)$images as $image) 
//            {
//                echo "<a href = " . $image . "><img src=" . $image . " height='42' width='42' ></img></a>";   
//            }
//            echo "</td></tr>";
        }
        
        echo "</tbody></table></div>";
        ?>
    </body>
</html>
