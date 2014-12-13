<?php 

/*
@(#)File:           New Login
@(#)Purpose:        New User Login
@(#)Author:         PrimeEstate
@(#)Product:        PrimeEstate Website 2014
*/

?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>PrimeEstate - Login</title>
	<meta name="generator" content="Bootply" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="http://sfsuswe.com/~f14g03/views/css/bootstrap.css" />
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link href="css/main.css" rel="stylesheet">

	<style>
	    h1{
		color: #12ACA5;
		font-weight: bold;
	    }
	</style>

    </head>
    <body>
	<!--login modal-->
	<div id="loginModal" class="modal show" role="dialog" aria-hidden="true">
	    <div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
			<h1 class="text-center">Sign in to your account</h1>
		    </div>
		    <div class="modal-footer">
			<form class="form col-md-12 center-block" method="post" action="loginhandler.php" name="loginform">
			    <div class="form-group">
				<input type="text" class="form-control input-lg" name="login_username" placeholder="Username" required>
			    </div>
			    <div class="form-group">
				<input type="password" class="form-control input-lg" name="login_password" placeholder="Password" required>
			    </div>
			    <div class="form-group" style="margin-bottom: 10px">
				<button class="btn btn-default btn-lg btn-block"><strong>LOGIN</strong></button>
				<span class="pull-left">
				    Not registered? <a href="http://sfsuswe.com/~f14g03/views/registration.php">Click here to sign up!</a>
				</span>
			    </div>
			</form>
			<div class="col-md-12">
			    <button class="close" data-dismiss="modal" aria-hidden="true" onClick="history.go(-1);
                    return true;">Cancel</button>
			</div>	
		    </div>
		</div>
	    </div>
	</div>

	<!-- jQuery -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </body>
</html>