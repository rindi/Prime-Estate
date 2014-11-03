<?php
//houseid_nameofimg_timestampofupload.jpg
include("views/navbar.php");
$target_dir = "assets/images/";
$target_dir = $target_dir . basename( $_FILES["uploadFile"]["name"]);
$uploadOk=1;

$suffix = substr($_FILES["uploadFile"]["name"], strpos($_FILES["uploadFile"]["name"], ".") + 1);

// Check if file already exists
if (file_exists($target_dir . $_FILES["uploadFile"]["name"])) 
{
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["uploadFile"]["size"] > 500000) 
{
    echo $_FILES["uploadFile"]["size"];
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Only GIF files allowed 
if (($_FILES["uploadFile"]["type"] == "image/gif") || ($_FILES["uploadFile"]["type"] == "image/jpeg")) 
{
    pass;
}
else
{
    echo "404!";
    $uploadOk = 0;
}
//elseif (!($_FILES["uploadFile"]["type"] == "image/jpeg"))
//{
//    echo "Sorry, only JPEG files are allowed.";
//    $uploadOk = 0;
//}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) 
{
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else 
{ 
    if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_dir)) 
    {
        echo "The file ". basename( $_FILES["uploadFile"]["name"]). " has been uploaded.";
    } 
    else 
    {
        echo "Sorry, there was an error uploading your file.";
    }
}

$now = "/~f14g03/views/assets/images/".$_FILES["uploadFile"]["name"];
echo $now;
?>

<html>

<body>
 <h2>Your image:</h2>
 <img src="<?php echo $now;?>" alt="img" style="width:304px;height:228px">
</body>

</html>