<?php
require ("Database.php");
// $dsn = 'mysql:host=localhost;dbname=student_f14g03';
// $dsn = 'mysql:host=localhost;dbname=student_f14g03;port=8889';
 $db = new Database();
// $db = new PDO($dsn, 'f14g03','fzR-5NY-5oM-W2y');
 
 /**
  * UserData SAMPLE
  */
 //Get Userinfo
 $dataSet = $db->getUsers();
 if($dataSet)
 {
     foreach($dataSet as $data)
     {
         echo "<p>";
         echo "UserName: ".$data->getUserName();
         echo "PassWord: ".$data->getUserPassword();
         echo "UserID: ".$data->getUserId();
         echo "UserType: ".$data->getUserType();
         
         echo "</p>";
     }
 }
 else
     echo "No Results Found!";
 //ADD
// $registration['username'] = "aaaaaaaa";
// $registration['password'] = "aaaaaaaas";
// $registration['type'] = "customer";
// $registration['email'] = "aaaaaaasajdoas@asmdoann.com";
// $db->addUser($registration);
 
  /**
  * ListingData SAMPLE
  */
 //DELETE
 //$db->deleteListing(14);
 //ADD
// $input['address'] = "3571 Culver Trail";
// $input['city'] = "Faribault";
// $input['zip'] = "94112";
// $input['price'] = "5";
// $input['rooms'] = "5";
// $input['bathrooms'] = "3.5";
// $input['description'] = "Cozy home away from home";
// $input['when_added'] = "today";
// $input['when_modified'] = "tomorrow";
// $db->addListing($input);
 //SEARCH
 //$listingSet = $db->searchListings('94132');
 //$listingSet = $db->searchListings('San Francisco');
 if($listingSet)
 {
     foreach($listingSet as $listingData)
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
     }
 }
 else
     echo "No Results Found!";
 
 
 
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