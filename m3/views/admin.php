<?php
include 'navbar.php';


if (isset($_SESSION["type"]))
$usertype = $_SESSION["type"];
else
$usertype = 0;
if($usertype == 2)
{
    header('Location: http://sfsuswe.com/~f14g03/views/dashboard.php');
}
else if($usertype != 3)
{
    header('Location: http://sfsuswe.com/~f14g03/');
}
?>
<?php if ($usertype == 3): ?>
<html>
    <head>
	<title> Administrator </title>
    </head>
    <body>
	<div class="container-fluid">
	    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="panel panel-primary">
		    <div class="panel-heading">
			<h3 class="panel-title">Administrator Functions</h3>
		    </div>
		    <div class="panel-body">
			<p>        
			    <a href="http://sfsuswe.com/~f14g03/views/registration.php" class="btn btn-primary btn-lg btn-block">Add Customer</a>
			</p><p>
			    <a href="http://sfsuswe.com/~f14g03/views/userlist.php?type=1" class="btn btn-primary btn-lg btn-block">View Customers</a>
			</p><p>
			    <a href="http://sfsuswe.com/~f14g03/views/registration.php?type=2" class="btn btn-primary btn-lg btn-block">Add Realtor</a>
			</p><p>
			    <a href="http://sfsuswe.com/~f14g03/views/userlist.php?type=2" class="btn btn-primary btn-lg btn-block">View Realtors</a>
			</p>
		    </div>
		</div>
	    </div> 
	</div>  
    </body>
</html>
<?php endif;?>