<?php
include 'navbar.php';
#include 'views/navbar.php';
#require '../controllers/users_controller.php';
#require '../models/user_model.php';
?>

<html>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
    <body>
        <br/>
        <form align="center" name="sell" action="sellsubmitted.php" method="POST">
            <!--            <div class="container-fluid">
                            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Sell your home with PrimeEstate</h3>
                                    </div>
                                    <div class="panel-body">-->
            <div id="paneler" class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Sell Your Home</h3>
                </div></div>
                <div class="row">
                    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-sm-12 ">
                        <div class="panel panel-primary">
                            <!--                        <div class="panel-heading">
                                                        <h3 class="panel-title">Registration</h3>
                                                    </div>-->
                            <div class="panel-body">
                                <table style="text-align:center; margin: 0px auto">
                                    <tr>
                                        <td>First Name*</td>
                                        <td>
                                            <input type="text" name="firstname" required/>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>Last Name*</td>
                                        <td>
                                            <input type="text" name="lastname" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number*</td>
                                        <td>
                                            <input type="text" name="phone"  id="phone" maxlength="10" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email*</td>
                                        <td>
                                            <input type="email" name="email" id="email" placeholder="me@example.com" required/>
                                        </td>
                                    </tr>
                                </table>
                                <br/>
                                <input type="submit" value="Submit" id="submitlead">   
                            </div>
                            </div>                        
                            </div>

                            <div id="infobox" style="margin-top:50px;" class="mainbox col-md-6 col-sm-12 ">
                                <div class="panel panel-next">
                                    <h2>
                                        Why Sell with PrimeEstate?
                                    </h2>

                                    <p>
                                        Buyers are out there, and with the help of a Prime Estate agent we can help find the right one for your home. 
                                        By listing your home now with a Prime Estate agent you could benefit from:
                                    <li>A quicker home sale - with fewer homes for sale, many homes are selling quickly and yours could be next</li>
                                    <li>Experience of a trusted company who helps sell thousands of houses a year</li>
                                    <li>A Higher sales price - with hundreds of potential buyers viewing your home on our website the likelyhood
                                    of multiple offers increases.  With more bids on your home, the sales price increases.</li>
                                    </p>
                                </div>
                            </div>
                        </div>                            
  
                        <!-- Three columns of text below the carousel -->
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
        </form>
    </body>
</html>
