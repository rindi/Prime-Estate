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

    <!--<div class="row">-->
    <!--<div class="col-md-4 col-md-offset-4">-->
   
    <div class="container-fluid">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
            <div class="panel panel-primary">
                		
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $userid;?>'s Profile</h3>
                </div>
                <div class<="panel-body">
                    <form class="form-horizontal" role="form" action="profilehandler.php" method="post" >
                        <!--<fieldset>-->
                        <!-- Form Name -->
                        <!--<legend>Home Preferences</legend>-->


                        <!-- Text input-->
                        <div class="form-group">
                            <br><br>
                            <label class="col-sm-2 control-label" for="textinput">Price Min</label>
                            <div class="col-sm-4">
                                <input type="text" name ="pricemin"
                                <?php
                                if ($profile->pricemin == 0)
                                    echo 'placeholder="Lower Range"';
                                else
                                    echo 'value =' . $profile->pricemin;
                                ?>>
                            </div>

                            <label class="col-sm-2 control-label" for="textinput">Maximum</label>
                            <div class="col-sm-4">
                                <input type="text" name ="pricemax"
                                <?php
                                if ($profile->pricemax == 0)
                                    echo 'placeholder="Upper Range"';
                                else
                                    echo 'value =' . $profile->pricemax;
                                ?>>

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">City</label>
                            <div class="col-sm-10">
                                <input type="text" name ="city" placeholder="City" value="<?php
                                   echo $profile->city;?>">
                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Zip</label>
                            <div class="col-sm-10">
                                <input type="text" name ="zip"                
                                <?php
                                if ($profile->zip == 0)
                                    echo 'placeholder="Zip / Postal Code"';
                                else
                                    echo 'value =' . $profile->zip;
                                ?>>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Bedrooms</label>
                            <div class="col-sm-10">
                                <input type="text" name ="bed"
                                <?php
                                if ($profile->bedrooms == 0)
                                    echo 'placeholder="Bedrooms"';
                                else
                                    echo 'value =' . $profile->bedrooms;
                                ?>>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Bathrooms</label>
                            <div class="col-sm-10">
                                <input type="text" name ="bathroom"
                                <?php
                                if ($profile->bathrooms == 0)
                                    echo 'placeholder="Bathrooms"';
                                else
                                    echo 'value =' . $profile->bathrooms;
                                ?>>            
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Details</label>
                            <div class="col-sm-10">
                                <input type="text"  name = "info" placeholder="Personal Preferences" 
                               value= "<?php echo  $profile->personalinformation?>">
                                
                            </div>
                            <input name = "id" type = "hidden"value  =<?php echo $id ?>>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="pull-right">
                                    <input class="btn btn-default" type="button" value="Cancel" onClick="history.go(-1);return true;">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="submit" formaction="search_results.php"class="btn btn-success">Search</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div> 
    </div>  
    <!--</fieldset>-->
</form>
<!--    </div> /.col-lg-12 
</div> /.row -->
</html>