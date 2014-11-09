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

echo "id: ".$z."<br>"; 
echo "address: ".$a."<br>";
echo "city: ".$b."<br>";
echo "zip: ".$c."<br>";
echo "price: ".$d."<br>";
echo "rooms: ".$e."<br>";
echo "bathrooms: ".$f."<br>";
echo "description: ".$g."<br>";


$listings_controller = new listings_controller();
$listing_model = new listing_model($z);

$listing_model->setAddress($a);
$listing_model->setCity($b);
$listing_model->setZip($c);
$listing_model->setPrice($d);
$listing_model->setRooms($e);
$listing_model->setBathrooms($f);
$listing_model->setDescription($g);

$listings_controller->editListing($listing_model);
?>