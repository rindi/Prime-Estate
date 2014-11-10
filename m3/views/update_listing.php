<?php

include("../models/listing_model.php");
include("../controllers/listings_controller.php");

$z = $_GET['id'];
$a = $_GET['address'];
$b = $_GET['city'];
$c = $_GET['zip'];
$d = $_GET['price'];
$e = $_GET['rooms'];
$f = $_GET['bathrooms'];
$g = $_GET['description'];

$listings_controller = new listings_controller();
$listing_model = new listing_model($z);


// 0-id 1-address 2-city 3-zip 4-price 5-rooms 6-bathromms 7-description

$arr[0] = $z;
$arr[1] = $a;
$arr[2] = $b;
$arr[3] = $c;
$arr[4] = $d;
$arr[5] = $e;
$arr[6] = $f;
$arr[7] = $g;

$listings_controller->editListing($arr);

?>

<label>Address</label><input type="text" value="<?php echo $a;?>"><br>
<label>City</label><input type="text" value="<?php echo $b;?>"><br>
<label>Zip</label><input type="number" value="<?php echo $c;?>"><br>
<label>Price</label><input type="number" value="<?php echo $d;?>"><br>
<label>Rooms</label><input type="number" value="<?php echo $e;?>"><br>
<label>Bathrooms</label><input type="number" value="<?php echo $f;?>"><br>
<label>Description</label><input value="<?php echo $g;?>"><br>
