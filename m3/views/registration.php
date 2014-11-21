<?php
include 'navbar.php';
#require '../controllers/users_controller.php';
#require '../models/user_model.php';
if (1 == count($_GET))
    $type = $_GET['type'];
else
    $type = null;
?>

<!-- register form -->
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
    <body>
        <br/>
        <?php
        if ($type == 2)
            echo "<form align='center' name='registration' action='confirmregistration.php?type=2' method='POST'>";
        else
            echo "<form align='center' name='registration' action='confirmregistration.php' method='POST'>";
        ?>
        <div id="paneler" class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Registration</h3>
            </div>
            <div class="row">
                <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-sm-12 ">
                    <div class="panel panel-primary">
                        <!--                        <div class="panel-heading">
                                                    <h3 class="panel-title">Registration</h3>
                                                </div>-->
                        <div class="panel-body">
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
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" required/> By checking here you agree to our <a href="http://sfsuswe.com/~f14g03/views/policy.php">Terms of Use and Privacy Policy.</a>
                                    </label>
                                </div>
                                <input type="submit" value="Register">
                            <?php } ?>
                        </div>
                    </div>
                </div> 
                <div id="infobox" style="margin-top:50px;" class="mainbox col-md-6 col-sm-12 ">
                    <div class="panel panel-next">
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
            <!-- Three columns of text below the carousel -->
            <div class="row" style="padding-top: 60px;">
                <div class="col-lg-4">
                    <img class="img-circle" src="http://sfsuswe.com/~f14g03/views/assets/images/2219_525342936910_6216.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                    <h2>Recently Added</h2>
                    <p>The beautiful home is located on the water and features and over hanging dock!  Once registered, you can create a profile to find the perfect home for you! 
                    </p>
                <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="img-circle" src="http://sfsuswe.com/~f14g03/views/assets/images/438_522404375810_2159_n.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                    <h2>Recently Sold</h2>
                    <p>A registered customer recently purchased this beautiful home in the heart of the city! </p>
                    <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="img-circle" src="http://sfsuswe.com/~f14g03/views/assets/images/happy.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                    <h2>Testimony</h2>
                    <p>Thanks to PrimeEstate's Home Buyer's guide, I was able to buy my first home with confidence!</p>
                    <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        <!--</div>-->
        <br/>
        <script type="text/javascript">
            window.onload = function ()
                    document.forms[0].addEventListener('submit', function (evt)
            {
                var firstpassword = document.getElementById('login_username');
                var confirmpassword = document.getElementById('login_username');
                if (firstpassword != confirmpassword)
                {
                    window.alert("Passwords do not match.");
                    evt.preventDefault();
                }
                var checker = document.getElementById('checkterms').value;
                //if(checker=="unchecked")
                    //{
                    //window.alert("Please accept our terms and conditions.");
                  //  evt.preventDefault();
                //}
        }, false)
        ;
        </script>    
    </form>
</body>

</html>
