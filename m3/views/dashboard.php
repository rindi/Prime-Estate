<?php
include 'navbar.php';
if ($_SESSION['type'] != 2) {
    header('Location: http://sfsuswe.com/~f14g03');
}
?>
<html>
    <head>
        <title> Realtor </title>
	<style>
	    h1{
		color: #12ACA5;
		margin: 20px;
		text-align: center;
		font-weight: bold;
	    }
	</style>
    </head>
    <body>
	<div class="container">
	    <div class="panel panel-default">
		<h1>
		    Realtor
		</h1>
	    </div>

	    <a href="http://sfsuswe.com/~f14g03/views/registration.php" class="btn btn-default">Add Customer</a>
	    <a href="http://sfsuswe.com/~f14g03/views/interestedcustomers.php" class="btn btn-default">View Interested Customers</a>
	    <a href="http://sfsuswe.com/~f14g03/views/add_listing.php" class="btn btn-default">Add listings</a>
	</div>
    </body>
</html>
