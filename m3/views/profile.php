<!DOCTYPE html>

<?php
include 'navbar.php';

require_once ("../controllers/profile_controller.php");
require_once ("../models/profile_model.php");
//SET THESE VARIABLES
//$dbRow['bedrooms'];
//$dbRow['bathrooms'];
//$dbRow['pricemax'];
//$dbRow['pricemin'];
//$dbRow['zip'];
//$dbRow['personalinformation'];
//$dbRow['userid'];
//CALL THIS
//$profile = new profile_model($dbRow);
$profilecontroller = new profile_controller();
//GET THE CUSTOMER ID SOMEHOW (prolly cookies)
$customerid = 225;
//GET THEIR PROFILE
$profile = $profilecontroller->getProfile($customerid);
//UPDATE THEIR PROFILE WITH WHATEVER CHANGES THEY MAKE
$newValue = 2000;
$profile->setPricemax($newValue);
//$profile->setPricemin($newValue);
$profilecontroller->updateCustomerProfile($profile);

//$results = $profilecontroller->getProfileResults($profile);
//if ((array) $results)
//{
//foreach ((array) $results as $row) 
//{
////    var_dump($row); 
//    echo $row->getAddress();
//}
////}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <style>

        #texttable,p{   
            margin-left: 2cm;
        }



    </style>
    <body>

    <form action="" method="post" style="text-align:left; margin: 0px auto">
            <p><center>
                <b><font size="5">MY PROFILE</font>
            </center></p>
        <p>SEARCH INFORMATION </p>
        <table id ="texttable">
            <tr>
                <td>Price: Min </td>
                <td><input id = "textfield"type="text" name="pricemin" ></td>
                <td> Max </td>
                <td><input id = "textfield"type="text" name="pricemax" ></td>
            </tr>

            <tr>
                <td>Zip Code:</td>
                <td><input id = "textfield"type="text" name="zip" ></td>
            </tr>
            <tr>
                <td>Bedrooms:</td>
                <td><input id = "textfield"type="text" name="bed" ></td>
            </tr>

            <tr>
                <td>Bathrooms:</td>
                <td><input id = "textfield"type="text" name="bathroom" ></td>
            </tr>


        </table>
       
 
        <p><b>PERSONAL INFORMATION</b> </p>

        <p>
            <textarea name="info" rows="20" cols="80"> </textarea>
        </p>
        <center><input id = "update" type="submit" value = "update" ></center>
        </form>
</body>

</html>
