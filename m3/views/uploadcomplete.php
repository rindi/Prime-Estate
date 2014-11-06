<?php
require_once ("../controllers/listings_controller.php");
include 'navbar.php';
$target_dir = "assets/images/";
$uploadOk=1;

$suffix = substr($_FILES["uploadFile"]["name"], strpos($_FILES["uploadFile"]["name"], ".") + 1);

// Check file size
if ($_FILES["uploadFile"]["size"] > 26214400) 
{
    echo $_FILES["uploadFile"]["size"];
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Only GIF files allowed 
if (($_FILES["uploadFile"]["type"] == "image/gif") || ($_FILES["uploadFile"]["type"] == "image/jpeg")) 
{
    $result = 'success!';
}
else
{
    echo "fail";
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
    {
        $result = 'success!';
    } 
    else 
    {
        echo "Sorry, there was an error uploading your file.";
        $result = 'failure!';
    }
}
$now = "/~f14g03/views/assets/images/".$newfilename;
$listingcont = new listings_controller();
$curlisting = new listing_model($listingcont->getListing(41));
$listingcont->setImage($curlisting->getId(), $newfilename)
?>

<html>

<body>
 <h2>Image upload <?php echo $result;?></h2>
 <img src="<?php echo $now;?>" alt="img" style="width:304px;height:228px">
</body>

</html>