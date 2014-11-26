<?php
include 'navbar.php';
#include 'views/navbar.php';
#require '../controllers/users_controller.php';
#require '../models/user_model.php';
?>

<html>
    <head>
        <title>PrimeEstate - Sell your home with us</title>
        </head>
    <script>
        $(document).ready(function(e) {
        $('#submitlead').click(function() {
        var sEmail = $('#email').val();
                var sPhone = $('#phone').val();
                if ($.trim(sPhone).length == 0) {
        alert('Please enter valid phone number');
                e.preventDefault();
        }
        if ($.trim(sEmail).length == 0) {
        alert('Please enter valid email address');
                e.preventDefault();
        }
        if (validatePhone(sPhone)) {
        1 = 1;
        }
        else {
        alert('Invalid Phone Number');
                e.preventDefault();
        }
        if (validateEmail(sEmail)) {
        1 = 1;
        }
        else {
        alert('Invalid Email Address');
                e.preventDefault();
        }
        });
        });
                function validatePhone(phone) {
                var filter = /^\d{10}/;
                        if (filter.test(phone)) {
                return true;
                }
                else {
                return false;
                }
                }
        function validateEmail(sEmail) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                if (filter.test(sEmail)) {
        return true;
        }
        else {
        return false;
        }
        }
    </script>
    <body style="padding-bottom: 40px">
        <div class="container">
	    <div id="paneler" class="panel panel-default" style="text-align: center;color:#12aca5">
		<h1 class="panel-body"><strong>Sell your home with PrimeEstate</strong></h1>
	    </div>

	    <div class="panel panel-default">
		<div class="row">
		    <div class="col-xs-12 col-sm-6">
			<div class="clearfix" style="padding-bottom: 20px;">
                            <h4>
                                Fill out the form to contact us and sell your home!
                            </h4>

                            <form style="margin: 20px" class="form-horizontal" name="sell" action="sellsubmitted.php" method="POST">
                            <div class="form-group"> 
                                <label for="" class="col-sm-3 control-label">First name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="firstname" placeholder="First name" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Last name</label>
                                <div class="col-sm-9">
                                  <input class="form-control" type="text" name="lastname" placeholder="Last name" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Phone Number</label>
                                <div class="col-sm-9">
                                  <input class="form-control" type="text" name="phone" placeholder="Phone Number" maxlength="10" required/>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="email" name="email" placeholder="me@example.com"required/>
                            </div>
                            </div>
                            <button class="btn btn-default pull-right">Submit</button>
                            <!--<input type="submit" value="Submit" id="submitlead">   -->
                            </form>
			</div>
		    </div>
		    <div class="col-xs-12 col-sm-6">
			<div id="infobox">
			    <div class="" style="paddingright: 20px">
				<h2>
				    Why Sell with PrimeEstate?
				</h2>

				<p>
				    Buyers are out there, and with the help of a PrimeEstate agent we can help find the right one for your home. 
				    By listing your home now with a PrimeEstate agent you could benefit from:
				<li>A quicker home sale - with fewer homes for sale, many homes are selling quickly and yours could be next</li>
				<li>Experience of a trusted company who helps sell thousands of houses a year</li>
				<li>A Higher sales price - with hundreds of potential buyers viewing your home on our website the likelyhood
				    of multiple offers increases.  With more bids on your home, the sales price increases.</li>
				</p>
			    </div>
			</div>
		    </div>
		</div>
	    </div>



	    <!-- Three columns of text below the carousel -->
	    <div class="panel panel-default" style="text-align: center">
		<div class="well well-padding">
		    <div class="row" style="padding-top: 60px;">
			<div class="col-lg-4">
			    <img class="img-circle" src="http://sfsuswe.com/~f14g03/views/assets/images/121951415243587.JPG" alt="Generic placeholder image" style="width: 140px; height: 140px;">
			    <h2>Recently Sold</h2>
			    <p>With the help of a PrimeEstate agent, we can help you sell your current home and find your dream home today! 
			    </p>
			<!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
			    <img class="img-circle" src="http://sfsuswe.com/~f14g03/views/assets/images/47567_535437611765_8287192_n.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
			    <h2>Testimony</h2>
			    <p>Thanks to our PrimeEstate agent we were able to sell our old house and find our dream home!</p>
			    <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
			    <img class="img-circle" src="http://sfsuswe.com/~f14g03/views/assets/images/438_522404375810_2159_n.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
			    <h2>Recently Sold</h2>
			    <p>A registered customer recently purchased this beautiful home in the heart of the city! </p>
			    <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
			</div><!-- /.col-lg-4 -->
		    </div><!-- /.row -->
		</div>
	    </div>

	</div> 

    </body>
</html>
