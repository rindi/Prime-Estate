<?php
#echo $_POST['address'].' '.$_POST['city'].' '.$_POST['zip'].' '.$_POST['price'].' '.$_POST['rooms'].' '.$_POST['bathrooms'].' '.$_POST['description'].' ';
include("Brain/dbconfig.php");

$addr  = $_POST['address'];
$city  = $_POST['city'];
$zip   = $_POST['zip'];
$price = $_POST['price'];
$rooms = $_POST['rooms'];
$brooms = $_POST['bathrooms'];
$desc   = $_POST['description'];
$when_added = date("Y/m/d");
$addrns = preg_replace('/\s+/', '+', $addr);
echo $addrns;
$map = 'https://maps.googleapis.com/maps/api/staticmap?center=/'.addrns.'&zoom=14&size=400x400&markers=color:blue7Clabel:S%7C11206'.addrns;
echo $map;
#echo $addr.' '.$city.' '.$zip.' '.$price.' '.$rooms.' '.$brooms.' '.$desc.' ';

$add_house =  $pdo->prepare("INSERT INTO houses (address, city, zip, price, rooms, bathrooms, description, when_added) VALUES (:addr, :city, :zip, :price, :rooms, :brooms, :description, :when_added)");
$add_house->execute(array(  ':addr' => $addr,
                            ':city' => $city, 
                            ':zip' => $zip,
                            ':price' => $price,
                            ':rooms' => $price,
                            ':brooms' => $brooms,
                            ':description' => $desc,
                            ':when_added' => $when_added,
                            ':map' => $map
                         )
                    );
                    header("Location: index.php")

?>