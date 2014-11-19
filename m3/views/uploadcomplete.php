<?php
//houseid_nameofimg_timestampofupload.jpg
require_once ("../controllers/listings_controller.php");
include 'navbar.php';
$target_dir = "assets/images/";
$newfilename = "";
//$target_dir = $target_dir . basename( $_FILES["uploadFile"]["name"]);
$uploadOk = 1;
echo $_SESSION['userid'];

$suffix = substr($_FILES["uploadFile"]["name"], strpos($_FILES["uploadFile"]["name"], ".") + 1);
echo $suffix;
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
    echo $target_dir . $newfilename;
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
$curlisting = new listing_model($listingcont->getNewListing($_SESSION['userid']));
//Sets the image in the database
//$listingcont->setImage($curlisting->getId(), $_FILES["uploadFile"]["name"])
//$listingcont->setImage($curlisting->getId(), $newfilename);
$listingcont->setImage($listingcont->getNewListing($_SESSION['userid']), $newfilename);

$list_page = '"http://sfsuswe.com/~f14g03/views/listing_page.php?id='.$listingcont->getNewListing($_SESSION['userid']).'"';
//echo $list_page;
?>

<html>

<body>
           <div class="container-fluid">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">Image upload <?php echo $result;?></h2>
                </div>
                <div class="panel-body">
 
 <img src="<?php echo $now;?>" alt="img" style="width:304px;height:228px">
 
 <li><a href="http://sfsuswe.com/~f14g03/views/upload.php">Step 3: Upload Another Image</a></li>
 <li><a href=<?php echo $list_page;?>>Continue to Listing Page</a></li>
 </div>
            </div> 
        </div>  
</body>

</html>