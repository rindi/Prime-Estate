<?php
include("navbar.php");
require '../models/listing_model.php';
require '../controllers/listings_controller.php';
if (!isset($_SESSION)) {
    session_start();
    $userid = $_SESSION['userid'];
}
if ($_SESSION['type'] != 2) {
    header('Location: http://sfsuswe.com/~f14g03/views/newlogin.php');
}

//echo $_SESSION['userid'];
if (isset($_POST['SubmitButton'])) {

    $input['address'] = $_POST['address'];
    $input['city'] = $_POST['city'];
    $input['zip'] = $_POST['zip'];
    $input['price'] = $_POST['price'];
    $input['rooms'] = $_POST['rooms'];
    $input['bathrooms'] = $_POST['bathrooms'];
    $input['description'] = $_POST['description'];
    $input['userid'] = $_SESSION['userid'];
    
        $house = new listing_model($input);
        $listing_controller = new listings_controller();
        $listing_controller->addListing($house);
        if(isset($_POST['backButton']))
        {
            header('Location: http://sfsuswe.com/~f14g03/');

        }
        header('Location: http://sfsuswe.com/~f14g03/views/upload.php');
    }
?>

<html>
 <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Prime Estate - Add Listing</title>
        <style>
            ol.progtrckr li {
    display: inline-block;
    text-align: center;
    line-height: 3em;
}
        ol.progtrckr[data-progtrckr-steps="2"] li { width: 49%; }
ol.progtrckr[data-progtrckr-steps="3"] li { width: 33%; }
ol.progtrckr[data-progtrckr-steps="4"] li { width: 24%; }

ol.progtrckr li.progtrckr-active {
    color: black;
    border-bottom: 4px solid black;
}
            ol.progtrckr li.progtrckr-done {
    color: black;
    border-bottom: 4px solid yellowgreen;
}
ol.progtrckr li.progtrckr-todo {
    color: silver; 
    border-bottom: 4px solid silver;
}    
        </style>
        <script>
            $(window).load(function(){
    $("ol.progtrckr").each(function(){
        $(this).attr("data-progtrckr-steps", 
                     $(this).children("li").length);
    });
})
</script>
    </head>
<body>
 <div class="container-fluid">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 class="panel-title" style="text-align:center"><strong>Step 1 of 2 : Add Listing Details</strong></h1>
                </div>
                <div class="panel-body">
                    <div class="row" style="margin:0 auto;">
                         <div class="center-block">
                              
                        <ol class="progtrckr" data-progtrckr-steps="4">
                            <li class="progtrckr-done">Start</li>
                            <li class="progtrckr-active">Enter Details</li>
                            <li class="progtrckr-todo">Upload Images</li>
                            <li class="progtrckr-todo">Done!</li>
                        </ol>
                          </div>
                     </div> 
                    <div class="row" style="margin:0 auto;">
                    <form class="form-horizontal" role="form" action="add_listing.php" method="post">
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Price</label>
                            <div class="col-sm-10">
                                <input type="number" name ="price" placeholder="Price" min="0" required>
                            </div>
                        </div>
                          <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="address" placeholder="Address" required/>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">City</label>
                            <div class="col-sm-10">
                                <input type="text" name ="city" placeholder="City" required/>
                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Zip</label>
                            <div class="col-sm-10">
                                <input type="text" name ="zip" placeholder="Zip" required>              
                               
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Rooms</label>
                            <div class="col-sm-10">
                            <input type="number" name="rooms" placeholder="Rooms" min="0" required>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Bathrooms</label>
                            <div class="col-sm-10">
                            <input type="number" name="bathrooms" placeholder="Bedrooms" min="0" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="textinput">Description</label>
                            <div class="col-sm-10">
                                <input type="textarea"  name = "description" placeholder="Description">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="pull-right">
                                    <input class="btn btn-default" type="button" value="Back" onClick="history.go(-1);return true;">
                                    <button type="submit" name = "SubmitButton"class="btn btn-default">Add listing</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                

            </div>
        </div> 
    </div>  
    <!--</fieldset>-->
 </body>
  
                
</html>
