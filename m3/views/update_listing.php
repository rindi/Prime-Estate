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

$listing_model->setAddress($a);
$listing_model->setCity($b);
$listing_model->setZip($c);
$listing_model->setPrice($d);
$listing_model->setRooms($e);
$listing_model->setBathrooms($f);
$listing_model->setDescription($g);

if (!$listings_controller->editListing($listing_model) )
{
    die("if you see this call for editListing() returned false: database not updated.");
}

echo "id: ".$listing_model->getId()."<br>"; 
echo "address: ".$listing_model->getAddress()."<br>";
echo "city: ".$listing_model->getCity()."<br>";
echo "zip: ".$listing_model->getZip()."<br>";
echo "price: ".$listing_model->getPrice()."<br>";
echo "rooms: ".$listing_model->getRooms()."<br>";
echo "bathrooms: ".$listing_model->getBathrooms()."<br>";
echo "description: ".$listing_model->getDescription()."<br>";
?>