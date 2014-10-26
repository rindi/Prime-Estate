<?php
require ("Database.php");
$db = new Database();

 /**
  * UserData SAMPLE
  */
 //GET USERS
echo '<p>GET</p>';
$dataSet = $db->getUsers();
foreach($dataSet as $data)
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
$registration['username'] = "Jacha"; 
$registration['password'] = "ahhahaha";
$registration['type'] = "customer";
$registration['email'] = "ohno@asmdoann.com";
$newUser = new UserData($registration);
$db->addUser($newUser);

 /**
 * ListingData SAMPLE
 */
echo '<p>LISTINGS</p>';

//DELETE
echo '<p>DELETE</p>';
$db->deleteListing(24);

//ADD
// echo '<p>ADD</p>';
// $input['address'] = "2345 Culver Trail";
// $input['city'] = "Faribault";
// $input['zip'] = "94132";
// $input['price'] = "15";
// $input['rooms'] = "5";
// $input['bathrooms'] = "3.5";
// $input['description'] = "Cozy home away from home";
// $input['userid'] = "5";
// $newListing = new ListingData($input);
// $db->addListing($newListing);

//EDIT
echo '<p>EDIT</p>';
$input['address'] = "3571 Culver Trail";
$input['city'] = "Far";
$input['zip'] = "94132";
$input['price'] = "5";
$input['rooms'] = "10";
$input['bathrooms'] = "3.5";
$input['description'] = "Cozzzzy home away from home";
$input['id'] = "7";
$input['userid'] = "6";
$newListing = new ListingData($input);
$db->editListing($newListing);

//SEARCH
echo '<p>SEARCH</p>';
$listingSet = $db->searchListings('94132');
//$listingSet = $db->searchListings('San Francisco');
foreach((array)$listingSet as $listingData)
{
    echo "<p>";
    echo "Id: ".$listingData->getId();
    echo "Address: ".$listingData->getAddress();
    echo "City: ".$listingData->getCity();
    echo "Zip: ".$listingData->getZip();
    echo "Price: ".$listingData->getPrice();
    echo "Added: ".$listingData->getDateAdded();
    echo "Modified: ".$listingData->getDateModified();
    echo "Description: ".$listingData->getDescription();
    echo "Bathrooms: ".$listingData->getBathrooms();
    echo "Rooms: ".$listingData->getRooms(); 
    echo "</p>";
}

//REALTOR
echo '<p>REALTOR</p>';
$listingSet = $db->getListings('3');
//$listingSet = $db->searchListings('San Francisco');
foreach((array)$listingSet as $listingData)
{
    echo "<p>";
    echo "Id: ".$listingData->getId();
    echo "Address: ".$listingData->getAddress();
    echo "City: ".$listingData->getCity();
    echo "Zip: ".$listingData->getZip();
    echo "Price: ".$listingData->getPrice();
    echo "Added: ".$listingData->getDateAdded();
    echo "Modified: ".$listingData->getDateModified();
    echo "Description: ".$listingData->getDescription();
    echo "Bathrooms: ".$listingData->getBathrooms();
    echo "Rooms: ".$listingData->getRooms(); 
    foreach((array)$listingData->getImages() as $img)
    {
       echo "Image: ".$img;
    }
    echo "</p>";
}
 
 
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Database Connection with PDO</title>
    <link href="../../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Connecting with PDO</h1>
<?php if ($db) {
    echo "<p>Connection successful.</p>";
} elseif (isset($error)) {
    echo "<p>$error</p>";
}
?>
</body>
</html>