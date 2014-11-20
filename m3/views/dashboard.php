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
	    <div class="panel panel-default" style="padding:50px; text-align:center;">
		<div class="row btn-group">
		    <div class="col-xs-12">
			<a href="http://sfsuswe.com/~f14g03/views/registration.php" class="btn btn-default">Add Customer</a>
		    </div>
		    <div class="col-xs-12">
			<a href="http://sfsuswe.com/~f14g03/views/interestedcustomers.php" class="btn btn-default">View Interested Customers</a>
		    </div>
		    <div class="col-xs-12">
			<a href="http://sfsuswe.com/~f14g03/views/add_listing.php" class="btn btn-default">Add Listings</a>
		    </div>
		    <div class="col-xs-12">
			<a href="http://sfsuswe.com/~f14g03/views/search_results.php?search=94132.php" class="btn btn-default">Search Listings</a>
		    </div>
		</div>
		
		
		
	    </div>
	</div>
    </body>
</html>
