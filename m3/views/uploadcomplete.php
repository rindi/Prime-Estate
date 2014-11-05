<?php
//houseid_nameofimg_timestampofupload.jpg
require_once ("../controllers/listings_controller.php");
include 'navbar.php';
$target_dir = "assets/images/";
//$target_dir = $target_dir . basename( $_FILES["uploadFile"]["name"]);
$uploadOk=1;

$suffix = substr($_FILES["uploadFile"]["name"], strpos($_FILES["uploadFile"]["name"], ".") + 1);

// Check if file already exists
//if (file_exists($target_dir . $_FILES["uploadFile"]["name"])) 
//{
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//}

// Check file size
if ($_FILES["uploadFile"]["size"] > 5000000) 
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
    $newfilename = rand(1,99999) . '.' .end($temp);
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
$curlisting = new listing_model($listingcont->getListing(41));
//Sets the image in the database
//$listingcont->setImage($curlisting->getId(), $_FILES["uploadFile"]["name"])
$listingcont->setImage($curlisting->getId(), $newfilename)
?>

<html>

<body>
 <h2>Image upload <?php echo $result;?></h2>
 <img src="<?php echo $now;?>" alt="img" style="width:304px;height:228px">
</body>

</html>