<?php

/*
@(#)File:           Upload 
@(#)Purpose:        Upload Photo to Listing
@(#)Author:         PrimeEstate
@(#)Product:        PrimeEstate Website 2014
*/

include 'navbar.php';
require_once ("../controllers/listings_controller.php");

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$listingcont = new listings_controller();
//echo $_SESSION['userid'];echo "House ID " . $listingcont->getNewListing($_SESSION['userid']);
if(isset($_GET['id']))
{
    $list_page = '"http://sfsuswe.com/~f14g03/views/listing_page.php?id='.$_GET['id'].'"';
}    
else
{
    $list_page = '"http://sfsuswe.com/~f14g03/views/listing_page.php?id='.$listingcont->getNewListing($_SESSION['userid']).'"';
}
?>
<html>
    <head>
        <title> PrimeEstate - Upload Your image </title>    
          
<style>
            form { 
margin: 0 auto; 
}
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
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">Step 2: Please select the image you wish to upload</h2>
                </div>
                <div class="row" style="margin:0 auto;">
                         <div class="center-block">
                              
                        <ol class="progtrckr" data-progtrckr-steps="4">
                            <li class="progtrckr-done">Start</li>
                            <li class="progtrckr-done">Enter Details</li>
                            <li class="progtrckr-active">Upload Images</li>
                            <li class="progtrckr-todo">Done!</li>
                        </ol>
                          </div>
                     </div> 
                <div class="panel-body">
               <div class="center-block">

        <!--<span class="glyphicon glyphicon-search"></span>-->
        <form action="uploadcomplete.php<?php echo isset($_GET['id']) ? "?id=".$_GET['id'] : '';?>" method="post" enctype="multipart/form-data">
                Please choose a file: 
            <input type="file" name="uploadFile" id="uploadFile"><br>
            <input type="submit" value="Upload File">
            <br>
            <br>
            <br>

            <input class="btn btn-default" style="float: left;" type="button" value="Back to details page" onClick="history.go(-1);return true;">
            <a href=<?php echo $list_page;?>><input class="btn btn-default" style="float: right;" type="button" value="Skip uploading an image, continue to Listing page" align="right"></a>
        </form>
        
            <script>
            document.forms[0].addEventListener('submit', function( evt ) {
                var file = document.getElementById('uploadFile').files[0];

                if(file && file.size < 2621440) { // 2.5 MB (this size is in bytes)
                    //Submit form        
                } else {
                    window.alert("File not found or size larger than 2.5 MB");
                    evt.preventDefault();
                }
            }, false);
            </script>
            </div>
            </div> 
        </div>  
    </body>
</html>