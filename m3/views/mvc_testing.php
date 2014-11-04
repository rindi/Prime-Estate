<?php
//require ("../controllers/controller.php");
require ("../controllers/users_controller.php");
require ("../controllers/listings_controller.php");
//$db = new Controller();
$user_contr = new users_controller();
$users = $user_contr->getUsers();
//print_r($user_contr);
//echo "<br>";
//print_r($users);
foreach($users as $data)
{
    echo "<p>";
    echo "UserName: ".$data->getUserName();
    echo "PassWord: ".$data->getUserPassword();
    echo "UserID: ".$data->getUserId();
    echo "UserType: ".$data->getUserType();
    echo "</p>";
}

//ADD USER
echo '<p>ADD</p>';
$registration['username'] = "Mochahhhh"; 
$registration['password'] = "lol";
$registration['type'] = "customer";
$registration['email'] = "ohyes@asmdoann.com";
$newUser = new user_model($registration);
$user_contr->addUser($newUser);

//$users['username'] = "chuck norris";
//print_r($users[0]);

//test user creation
//$user_contr->addUser($users[0]);


/**
 * ListingData SAMPLE
 */
//echo '<p>LISTINGS</p>';
$listing_contr = new listings_controller();
//DELETE
//echo '<p>DELETE</p>';
//$listing_contr->deleteListing(51);

////GET
//echo '<p>GET</p>';
//$temp  = new listing_model($listing_contr->getListing('55'));
//echo "<p>";
//echo "Id: ".$temp->getId();
//echo "Address: ".$temp->getAddress();
//echo "City: ".$temp->getCity();
//echo "Zip: ".$temp->getZip();
//echo "Price: ".$temp->getPrice();
//echo "Added: ".$temp->getDateAdded();
//echo "Modified: ".$temp->getDateModified();
//echo "Description: ".$temp->getDescription();
//echo "Bathrooms: ".$temp->getBathrooms();
//echo "Rooms: ".$temp->getRooms(); 
//echo "</p>";

////ADD
//echo '<p>ADD</p>';
//$input['address'] = "22 Culver Trail";
//$input['city'] = "Faribault";
//$input['zip'] = "94132";
//$input['price'] = "15";
//$input['rooms'] = "5";
//$input['bathrooms'] = "3.5";
//$input['description'] = "Cozy home away from home";
//$input['userid'] = "5";
//$newListing = new listing_model($input);
//$listing_contr->addListing($newListing);

//EDIT
//echo '<p>EDIT</p>';
//$input['address'] = "3571 Culver Trail";
//$input['city'] = "Far";
//$input['zip'] = "94132";
//$input['price'] = "5";
//$input['rooms'] = "10";
//$input['bathrooms'] = "3.5";
//$input['description'] = "Cozzzzy home away from home";
//$input['id'] = "40";
//$input['userid'] = "6";
//$newListing = new listing_model($input);
//$listing_contr->editListing($newListing);

////SEARCH
//echo '<p>SEARCH</p>';
//$listingSet = $listing_contr->searchListings('f192');
////$listingSet = $listing_contr->searchListings('San Francisco');
//foreach((array)$listingSet as $listingData)
//{
//    echo "<p>";
//    echo "Id: ".$listingData->getId();
//    echo "Address: ".$listingData->getAddress();
//    echo "City: ".$listingData->getCity();
//    echo "Zip: ".$listingData->getZip();
//    echo "Price: ".$listingData->getPrice();
//    echo "Added: ".$listingData->getDateAdded();
//    echo "Modified: ".$listingData->getDateModified();
//    echo "Description: ".$listingData->getDescription();
//    echo "Bathrooms: ".$listingData->getBathrooms();
//    echo "Rooms: ".$listingData->getRooms(); 
//    echo "</p>";
//}

////REALTOR
//echo '<p>REALTOR</p>';
//$listingSet = $listing_contr->getRealtorListings('5');
//foreach((array)$listingSet as $listingData)
//{
//    echo "<p>";
//    echo "Id: ".$listingData->getId();
//    echo "Address: ".$listingData->getAddress();
//    echo "City: ".$listingData->getCity();
//    echo "Zip: ".$listingData->getZip();
//    echo "Price: ".$listingData->getPrice();
//    echo "Added: ".$listingData->getDateAdded();
//    echo "Modified: ".$listingData->getDateModified();
//    echo "Description: ".$listingData->getDescription();
//    echo "Bathrooms: ".$listingData->getBathrooms();
//    echo "Rooms: ".$listingData->getRooms(); 
//    foreach((array)$listingData->getImages() as $img)
//    {
//       echo "Image: ".$img;
//    }
//    echo "</p>";
//}
 
 
 ?>