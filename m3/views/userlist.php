<!DOCTYPE html>

<?php
include 'navbar.php';
require_once ("../controllers/users_controller.php");
require_once ("../models/user_model.php");
//TYPE Real vs Cust
$type=$_GET['type'];

//  this is the code from brain/check if logged in;
//    if( isset($_COOKIE['username']) )
//    {
//        $loggedin = true;
//        $loggedinas = $_COOKIE['username'];
//    }
//    else
//    {
//        $loggedin = false;
//    }
//    $value = $_POST["searchvalue"];
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

        <?php
        if ($type == 1)
            echo "<h2> Customers </h2>";
        else
            echo "<h2> Realtors </h2>";
            
//        $value=$_POST["searchvalue"];
     
        #echo $query;
        echo "<div class='results'>
        <table class='table' style='width:90%' border='1' align='center'>
        <thead>
        <tr>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>User Id</th>
        <th>Type</th>
        <th>Email</th>
        <th> </th>
        </tr></thead>";
        
        $user_controller = new users_controller();
        
        if ($type == 1)
            $userSet = $user_controller->getCustomers();
        else
            $userSet = $user_controller->getRealtors();
        
        foreach((array)$userSet as $userData) 
        {
            echo "<tbody><tr>";
//            echo "<td><a href=\"deleteuser.php?id=\">" . $houseval . "</a>";
//            echo "<a href=\"edit_listing.php?id=".$houseval."\"> Edit</a>";
//            echo "</td>";
            echo "<td>" . $userData->getUserName() . "</td>";
            echo "<td>" . $userData->getFirstname() . "</td>";
            echo "<td>" . $userData->getLastname() . "</td>";
            echo "<td>" . $userData->getUserid() . "</td>";
            echo "<td>" . $userData->getUserType() . "</td>";
            echo "<td>" . $userData->getUserEmail() . "</td>";
            echo "<td>" . "<a href='http://stackoverflow.com' class='btn btn-default' value='Edit Listing' type='button' onclick='return confirm("."'Are you sure you want to delete this listing?'".");'>Delete User</a>" . "</td>";
//            echo "<td><a href='" . $mapurl . "'><img src='assets/logo/maplink.png' height='42' width='42' ></img></a></td><td>";
//            echo "<a href = 'https://google.com'> Click Here </a></td><td>";
//            echo "<a href = '>" . $mapurl . " target='_blank'><img src='static/map-creation.png'></img></a></td><td>";
            #IMAGES!??!
//            $images = $listingData->getImages();
//            foreach((array)$images as $image) 
//            {
//                echo "<a href = " . $image . "><img src=" . $image . " height='42' width='42' ></img></a>";   
//            }
//            echo "</td></tr>";
            
//            $imgquery="SELECT path FROM images WHERE houseid='$houseval'";
//            $imgresult=$con->query($imgquery);
//            
//            while($imgrow = mysqli_fetch_array($imgresult)) {
//            echo "<a href = " . $imgrow['path'] . "><img src=" . $imgrow['path'] . " height='42' width='42' ></img></a>";}
//            echo "</td></tr>";
        }
        
        echo "</tbody></table></div>";
//        if (!mysqli_query($con,$query)) {
//            die('Error: ' . mysqli_error($con));
//        }
        ?>
        
    </body>
</html>
