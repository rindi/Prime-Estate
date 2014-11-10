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


echo "id: ".$listing_model->getId()."<br>"; 
echo "address: ".$listing_model->getAddress()."<br>";
echo "city: ".$listing_model->getCity()."<br>";
echo "zip: ".$listing_model->getZip()."<br>";
echo "price: ".$listing_model->getPrice()."<br>";
echo "rooms: ".$listing_model->getRooms()."<br>";
echo "bathrooms: ".$listing_model->getBathrooms()."<br>";
echo "description: ".$listing_model->getDescription()."<br>";
?>

<label>Address</label>