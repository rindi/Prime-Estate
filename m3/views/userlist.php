<!DOCTYPE html>

<?php
include 'navbar.php';
require_once ("../controllers/users_controller.php");
require_once ("../models/user_model.php");
//TYPE Real vs Cust
$type = $_GET['type'];



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
        h1{
	    text-align: center; 
	    color: #12aca5;
	    margin: 10px;		
        }
	.table{
	    border-color: #12aca5;
	}
    </style>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body style="padding-bottom: 40px">
	<div class="container">
	    <?php
	    if ($type == 1)
		echo "<div class=\"panel panel-default\"><h1> Customers </h1></div>";
	    else
		echo "<div class=\"panel panel-default\"><h1> Realtors </h1></div>";

//        $value=$_POST["searchvalue"];
	    #echo $query;
	    echo "<div class='results'>
        <table class='table' style='width:100%' align='center'>
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

	    //if we were asked to delete a user delete them!
	    if (count($_GET) == 2) { {
		    $user_controller->delete($_GET['userid']);
		}
	    }



	    if ($type == 1)
		$userSet = $user_controller->getCustomers();
	    else
		$userSet = $user_controller->getRealtors();

	    foreach ((array) $userSet as $userData) {
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
		echo "<td>" . "<a href='http://sfsuswe.com/~f14g03/views/userlist.php?type=" . $type . "&userid=" . $userData->getUserid() . "' class='btn btn-default' value='Edit Listing' type='button' onclick='return confirm(" . "'Are you sure you want to delete this listing?'" . ");'>Delete User</a>" . "</td>";

	    }

	    echo "</tbody></table></div>";

	    ?>
        </div>
    </body>
</html>
