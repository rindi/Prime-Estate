<?php

/*
@(#)File:           Contact Us
@(#)Purpose:        Contact PrimeEstate
@(#)Author:         PrimeEstate
@(#)Product:        PrimeEstate Website 2014
*/

include("navbar.php");
?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>PrimeEstate - Contact Us</title>
    </head>
       <body style="padding-bottom: 40px">
        <div class="container">
	    <div id="paneler" class="panel panel-default" style="text-align: center;color:#12aca5">
		<h1 class="panel-body"><strong>Contact PrimeEstate</strong></h1>
	    </div>
        <div class="panel panel-default" style="padding: 20px">
            <div class="row">
                <form role="form" action="" method="post" >
                    <div class="col-lg-6 clearfix">
                        <div class="form-group">
                            <label for="InputName">Your Name</label>
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="InputEmail">Your Email</label>
                            <div class="input-group col-xs-12">
                                <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter Email" required  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="InputMessage">Message</label>
                            <div class="input-group col-xs-12">
                                <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="InputReal">What is 4+3? (Simple Spam Checker)</label>
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control" name="InputReal" id="InputReal" required>
                            </div>
                        </div>
                        <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
                    </div>
                </form>
                <hr class="featurette-divider hidden-lg" style="border-color: #12cac5;">
                <div class="col-lg-5 col-md-push-1">
                    <address>
                        <h3>Office Location</h3>
                        <p class="lead">PrimeEstate<br>
                            1600 Holloway Ave,<br>
                            San Francisco, CA 94132<br>
                            Phone: XXX-XXX-XXXX<br>
                            Email: <a href="mailto:f14g03@sfsuswe.com">f14g03@sfsuswe.com</a>
                        </p>
                    </address>
                </div>
            </div>

        </div>
        </div>
    </body>
</html>
