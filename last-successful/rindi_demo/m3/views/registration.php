<?php
/*
  @(#)File:           Registration
  @(#)Purpose:        User Registration
  @(#)Author:         PrimeEstate
  @(#)Product:        PrimeEstate Website 2014
 */

include 'navbar.php';
#include 'views/navbar.php';
#require '../controllers/users_controller.php';
#require '../models/user_model.php';
?>

<html>
    <head>
        <title>
            PrimeEstate - Registration
        </title>
    </head>
    <body style="padding-bottom: 40px">
        <div class="container">
            <div id="paneler" class="panel panel-default" style="text-align: center;color:#12aca5">
                <h1 class="panel-body"><strong>Registration</strong></h1>
            </div>

            <div class="panel panel-default">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="clearfix" style="padding-bottom: 20px;">
                            <form method="POST" action="confirmregistration.php">
                                <table style="text-align:center; margin: 0px auto">
                                    <tr>

                                        <td>Username*</td>
                                        <td>
                                            <input type="text" name="login_username" required/>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>Password*</td>
                                        <td>
                                            <input type="password" name="login_password" id="login_password" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Confirm Password*</td>
                                        <td>
                                            <input type="password" name="login_confirm_password" id="login_confirm_password" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email*</td>
                                        <td>
                                            <input type="text" name="login_email" id="email" placeholder="me@example.com" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>First Name</td>
                                        <td>
                                            <input type="text" name="first_name"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Last Name</td>
                                        <td>
                                            <input type="text" name="last_name"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>

                                    </tr>
                                </table>
                                <?php
                                if ($type == 0) {
                                    ?>
                                    <div class="checkbox" style="text-align:center;">
                                        <label>
                                            <input type="checkbox" required/> By checking here you agree to our <a href="http://sfsuswe.com/~f14g03/views/policy.php">Terms of Use and Privacy Policy.</a>
                                        </label>
                                    </div>                            
                                <?php
                                }
                                if ($type == 3) {
                                    echo '<input type="hidden" name="type" value="2"/>';
                                }
                                ?>

                                <button class="btn btn-default pull-right">Register</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div id="infobox">
                            <div class="" style="paddingright: 20px">
                                <h2>
                                    Why Register?
                                </h2>
                                <p>
                                    By registering with PrimeEstate we promise to keep your information 
                                    safe and only contact you if you chose to contact a realtor about a 
                                    home you are interested in.  Other benefits include:
                                <li>Exclusive access to profile page where you can create a customized search</li>
                                <li>Contact realtors quickly without having to enter your contact information more than once</li>
                                <li>Exclusive Home Buyer's Guide </li>
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
                            <h2>Recently Added</h2>
                            <p>A registered customer recently purchased this beautiful home in the heart of the city! </p>
                            <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
                        </div><!-- /.col-lg-4 -->
                    </div><!-- /.row -->
                </div>
            </div>

        </div> 

    </body>
</html>
