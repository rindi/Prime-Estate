<?php
//houseid_nameofimg_timestampofupload.jpg
require_once ("../controllers/listings_controller.php");
include 'navbar.php';
$target_dir = "assets/images/";
$newfilename = "";
//$target_dir = $target_dir . basename( $_FILES["uploadFile"]["name"]);
$uploadOk = 1;
//echo $_SESSION['userid'];

$suffix = substr($_FILES["uploadFile"]["name"], strpos($_FILES["uploadFile"]["name"], ".") + 1);
//echo $suffix;
// Check if file already exists
//if (file_exists($target_dir . $_FILES["uploadFile"]["name"])) 
//{
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//}

// Check file size
if ($_FILES["uploadFile"]["size"] > 26214400) 
{
    echo $_FILES["uploadFile"]["size"];
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Only GIF files allowed 
if (($_FILES["uploadFile"]["type"] == "image/gif") || ($_FILES["uploadFile"]["type"] == "image/jpeg") || ($_FILES["uploadFile"]["type"] == "image/png")) 
{
    $result = 'success!';
}
else
{
    echo "Upload failed, not an image";
    $uploadOk = 0;
    $result = 'failure';
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) 
{
    echo "Sorry, your file was not uploaded.";
    $result = 'failure!';
// if everything is ok, try to upload file
} 
else 
{ 
    $temp = explode(".",$_FILES["uploadFile"]["name"]);
    $date = date_create();
    $newfilename = rand(1,99999) . date_timestamp_get($date) . '.' .end($temp);
    //echo $target_dir . $newfilename;
    if(move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_dir . $newfilename))
    //if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_dir)) 
    {
//        echo "The file ". basename( $_FILES["uploadFile"]["name"]). " has been uploaded.";
        $result = 'success!';
    } 
    else 
    {
        echo "Sorry, there was an error uploading your file.";
        $result = 'failure!';
    }
}
$now = "/~f14g03/views/assets/images/".$newfilename;
//$now = "/~f14g03/views/assets/images/".$_FILES["uploadFile"]["name"];
$listingcont = new listings_controller();
//$curlisting = new listing_model($listingcont->getListing(41));
//echo $listingcont->getNewListing($_SESSION['userid']);
if(isset($_GET['id']))
    $listingid = $_GET['id'];
else
    $listingid = $listingcont->getNewListing($_SESSION['userid']);
$curlisting = new listing_model($listingid);
//Sets the image in the database
//$listingcont->setImage($curlisting->getId(), $_FILES["uploadFile"]["name"])
//$listingcont->setImage($curlisting->getId(), $newfilename);
$listingcont->setImage($listingid, $newfilename);

$list_page = '"http://sfsuswe.com/~f14g03/views/listing_page.php?id='.$listingid.'"';
//echo $list_page;
?>

<html>
    <head>
        <title>
            <?php if($result=='success') 
                echo "PrimeEstate - Add listing - Image uploaded!";
            else
                echo "PrimeEstate - Add listing - Image upload failure!";
            ?>
            
        </title>
<style>
        form { 
        margin: 0 auto; 
        }
        img
        {
        margin:auto;
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
                    <h2 class="panel-title">Image upload <?php echo $result;?></h2>
                </div>
                <div class="panel-body">
                    <div class="row" style="margin:0 auto;">
                         <div class="center-block">
                              
                        <ol class="progtrckr" data-progtrckr-steps="4">
                            <li class="progtrckr-done">Start</li>
                            <li class="progtrckr-done">Enter Details</li>
                            <li class="progtrckr-done">Upload Images</li>
                            <li class="progtrckr-done">Done!</li>
                        </ol>
                          </div>
                     </div>                     
                    <div class="row" style="margin:0 auto;">
                         <label>
                         Image uploaded successfully!
                         </label>
                        <br>
                        <img src="<?php echo $now;?>" alt="img" style="width:304px;height:228px;vertical-align:middle;" >
                    </div>
                    <div class="row">
                        <a href="http://sfsuswe.com/~f14g03/views/upload.php"><input class="btn btn-default" style="float: left;" type="button" value="Upload another image" align="left"></a>
                        <a href=<?php echo $list_page;?>><input class="btn btn-default" style="float: right;" type="button" value="I'm done, continue to Listing page" align="right"></a>
                    </div>
                </div> 
            </div>  
        </div>       
    </div>
</body>

</html>