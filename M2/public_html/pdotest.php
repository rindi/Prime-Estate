<?php
require ("Database.php");
// $dsn = 'mysql:host=localhost;dbname=student_f14g03';
// $dsn = 'mysql:host=localhost;dbname=student_f14g03;port=8889';
 $db = new Database();
// $db = new PDO($dsn, 'f14g03','fzR-5NY-5oM-W2y');
 
 //SAMPLE USING UserData
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
 
 //SAMPLE USING ListingData
 $listingSet = $db->searchListings('94324');
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