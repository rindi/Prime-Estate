<!DOCTYPE html>
<?php

/*
@(#)File:           Profile
@(#)Purpose:        Customer Profile Page
@(#)Author:         PrimeEstate
@(#)Product:        PrimeEstate Website 2014
*/

include 'navbar.php';
require_once ("../controllers/profile_controller.php");
require_once ("../models/profile_model.php");
require_once ("../controllers/users_controller.php");

$userid = $_SESSION["username"];
$profilecontroller = new profile_controller();
$usercontroller = new users_controller();
$id = $usercontroller->getUserId($userid);
$info = $usercontroller->getUserInfo($id);
$profile = $profilecontroller->getProfile(($id));

?>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>PrimeEstate - My Profile Page</title>


    </head>
    <body style="padding-bottom: 40px">
        <div class="container">
	    <div id="paneler" class="panel panel-default" style="text-align: center;color:#12aca5">
		<h1 class="panel-body"><strong><?php echo "Hello ! " ;echo $info["firstname"]; echo " "; echo $info["lastname"]?></strong></h1>
	    </div>

	    <div class="panel panel-default">
		<div class="row">
		    <div class="col-xs-12 col-sm-6">
			<div class="clearfix" style="padding-bottom: 20px;">
                            <form method="POST" action="profilehandler.php">
                                <table style="text-align:center; margin: 0px auto">
                                    <br><br>
                                <tr>

                                    <td><b>Price - Min</b></td>
                                    <td>
                                        <input type="text" name ="pricemin"
                                               accept=""<?php
                                               if ($profile->pricemin == 0)
                                                   echo 'placeholder="Lower Range"';
                                               else
                                                   echo 'value =' . $profile->pricemin;
                                               ?>>
                                    </td>
                                </tr> 
                                <tr>
                                    <td><b>Price - Max</b></td>
                                    <td>
                                        <input type="text" name ="pricemax"
                                        <?php
                                        if ($profile->pricemax == 0)
                                            echo 'placeholder="Upper Range"';
                                        else
                                            echo 'value =' . $profile->pricemax;
                                        ?>>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>City</b></td>
                                    <td>
                                        <input type="text" name ="city" placeholder="City" value="<?php echo $profile->city; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Zip</b></td>
                                    <td>
                                        <input type="text" name ="zip"                
                                        <?php
                                        if ($profile->zip == 0)
                                            echo 'placeholder="Zip / Postal Code"';
                                        else
                                            echo 'value =' . $profile->zip;
                                        ?>>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Bedrooms</b></td>
                                    <td>
                                        <input type="text" name ="bed"
                                        <?php
                                        if ($profile->bedrooms == 0)
                                            echo 'placeholder="Bedrooms"';
                                        else
                                            echo 'value =' . $profile->bedrooms;
                                        ?>>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Bathrooms</b></td>
                                    <td>
                                        <input type="text" name ="bathroom"
                                        <?php
                                        if ($profile->bathrooms == 0)
                                            echo 'placeholder="Bathrooms"';
                                        else
                                            echo 'value =' . $profile->bathrooms;
                                        ?>>            
                                    </td>
                                </tr>
                                 <tr>
                                     <td><b>Details</b></td>
                                    <td>
                                        <input type="text"  name = "info" placeholder="Personal Preferences" 
                                               value= "<?php echo $profile->personalinformation ?>">    
                                    </td>
                                     <input name = "id" type = "hidden"value  =<?php echo $id ?>>
                                </tr>
                                
                                <tr>
                                    <td></td>

                                </tr>
</table>
                           
                   
                     
                       
			</div>
		    </div>
		    <div class="col-xs-12 col-sm-6">
			<div id="infobox">
			    <div class="" style="paddingright: 20px">
				<h2>
                            Profile
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
                                    <div class="col-sm-offset-2 col-sm-10">
                                <div class="pull-right">
                                    <input class="btn btn-default" type="button" value="Cancel" onClick="history.go(-1);return true;">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <button type="submit" formaction="search_results.php"class="btn btn-success">Search</button>
                                </div>
                            </div>
                             </form>
                             
                            
                            
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
			   
			    </p>
			<!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
			    <img class="img-circle" src="http://sfsuswe.com/~f14g03/views/assets/images/47567_535437611765_8287192_n.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
			  
			    <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
			    <img class="img-circle" src="http://sfsuswe.com/~f14g03/views/assets/images/438_522404375810_2159_n.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
			 
			    <!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
			</div><!-- /.col-lg-4 -->
		    </div><!-- /.row -->
		</div>
	    </div>

	</div> 

    </body>
    
    
    
    
    
    
    
    
    
    
    
</html>