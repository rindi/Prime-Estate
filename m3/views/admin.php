<?php
include 'navbar.php';


if(isset($_SESSION["type"]))
    $usertype = $_SESSION["type"];
else
    $usertype = 0;

if($usertype==3)
{
?>
<html>
    <head>
        <title> Administrator </title>
    </head>
    <body>
        <h1 align="center">
            Administrator Functions
        </h1>
                                <a href="http://sfsuswe.com/~f14g03/views/registration.php" class="btn btn-default">Add Customer</a>
                                <a href="http://sfsuswe.com/~f14g03/views/userlist.php?type=1" class="btn btn-default">View Customer</a>
                                <a href="http://sfsuswe.com/~f14g03/views/registration.php?type=2" class="btn btn-default">Add Realtor</a>
                                <a href="http://sfsuswe.com/~f14g03/views/userlist.php?type=2" class="btn btn-default">View Realtors</a>
    </body>
</html>
<?php

}
else
{
    echo "Sorry, you do not have sufficient privileges to access this page.";
}
include 'data_usage.php';
?>