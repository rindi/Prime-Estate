<?php

/*
@(#)File:           Index
@(#)Purpose:        PrimeEstate Homepage
@(#)Author:         PrimeEstate
@(#)Product:        PrimeEstate Website 2014
*/

include 'navbar.php';
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

	<title>PrimeEstate - Index</title>

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
	<link rel="stylesheet" href="./css/cover.css" />
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
			<h1 class="cover-heading">Find your dream home with PrimeEstate</h1>
                        <h3 class="cover-heading">Search by City or Zip.</h3>
			<form class="form-horizontal" style="text-align:center; margin: 0px auto" action="search_results.php" method="GET">
			    <div class="form-group">
				<div class="col-xs-offset-3 col-xs-5">
				    <input id="search-field" type="search" name="search" placeholder="Enter a City or Zipcode" class="form-control">
				</div>
				<label for="submit-form" class="btn btn-default col-xs-1"><i class="glyphicon glyphicon-search"></i></label>
				<input id="submit-form" type="submit" class="btn btn-inverse col-xs-1 hidden">
			    </div>
			</form>
		    </div>
		    <hr>
		    <!-- Three columns of text below the carousel -->
		    <div class="row" style="padding-top: 40px;">
                        <div class="col-lg-4">
			    <img class="img-circle" src="assets/images/IMG_4592copy.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
			    <h2>Recently Sold</h2>
			    <p>We are proud to inform we just sold this nice house at the city's heart. </p>
                            <div><a class="btn btn-default" href="http://sfsuswe.com/~f14g03/views/search_results.php?search=sold" role="button">View Recently Sold &raquo;</a></div>
			</div><!-- /.col-lg-4 -->
                        
                        <div class="col-lg-4">
			    <img class="img-circle" src="assets/images/IMG_4588copy.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
			    <h2>Testimony</h2>
			    <p>"I bought house for my daughter from this website. It is great! Staff are very nice. Website is fully debugged!"
                            </p>
			</div>
                        <div class="col-lg-4">
			    <img class="img-circle" src="assets/images/IMG_4583copy.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
			    <h2>Recently Added</h2>
			    <p>House on Ocean Beach has joined our listings. It has beautiful view of the ocean, nice breeze & spacious rooms. 
				</p>
                            <div><a class="btn btn-default" href="http://sfsuswe.com/~f14g03/views/search_results.php?search=recent" role="button">View Recently Added &raquo;</a></div>
			</div><!-- /.col-lg-4 -->

                        <div>
                            <!--<a class="btn btn-default" href="http://sfsuswe.com/~f14g03/views/search_results.php?search=sacramento" role="button">View details &raquo;</a>-->
			</div><!-- /.col-lg-4 -->
		    </div><!-- /.row -->
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
