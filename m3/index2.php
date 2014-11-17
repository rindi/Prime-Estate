<?php
include 'views/navbar.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">

	<title>Cover Template for Bootstrap</title>

	<!-- Custom styles for this template -->
	<link href="cover.css" rel="stylesheet">

	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	<script src="../../assets/js/ie-emulation-modes-warning.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<link rel="stylesheet" href="http://sfsuswe.com/~f14g03/views/css/index.css" />
	<link rel="stylesheet" href="./views/css/cover.css" />
	<style>
	    body, html { 
	    overflow-x: hidden; 
	    overflow-y: auto;
	}
	</style>
    </head>

    <body>
	<div class="site-wrapper">
	    <div class="site-wrapper-inner">
		<div class="cover-container">
		    <div class="inner cover">
			<h1 class="cover-heading">Welcome to Prime Estate.</h1>
			<form class="form-horizontal" style="text-align:center; margin: 0px auto" action="views/search_results.php" method="POST">
                <div class="form-group">
                    <div class="col-xs-offset-3 col-xs-5">
                      <input type="search" name="searchvalue" placeholder="Enter a City or Zipcode" class="form-control">
                    </div>
                    <label for="submit-form" class="btn btn-default btn-lg col-xs-1"><i class="glyphicon glyphicon-search"></i></label>
                    <input id="submit-form" type="submit" class="btn btn-inverse col-xs-1 hidden">
                </div>
            </form>
		    </div>
		</div>
	    </div>
	</div>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="../../dist/js/bootstrap.min.js"></script>
	<script src="../../assets/js/docs.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	<script>
	    (function () {
		'use strict';
		if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
		  var msViewportStyle = document.createElement('style')
		  msViewportStyle.appendChild(
		    document.createTextNode(
		      '@-ms-viewport{width:auto!important}'
		    )
		  )
		  document.querySelector('head').appendChild(msViewportStyle)
		}
	      })();
	</script>
    </body>
</html>
