<?php
include 'navbar.php';
if( $_SESSION['type'] != 2 )
{
    die("Hey now brown cow! You are not realtor. Can't be here. die()");
}
?>
<html>
    <head>
        <title> Realtor </title>
    </head>
    <body>
        <h1 align="center">
            Realtor
        </h1>
        <a href="http://sfsuswe.com/~f14g03/views/registration.php" class="btn btn-default">Add Customer</a>
        <a href="http://sfsuswe.com/~f14g03/views/interestedcustomers.php" class="btn btn-default">View Interested Customers</a>
        <a href="http://sfsuswe.com/~f14g03/views/leads.php" class="btn btn-default">View Interested Sellers</a>
        <a href="http://sfsuswe.com/~f14g03/views/add_listing.php" class="btn btn-default">Add listings</a>
    </body>
</html>
