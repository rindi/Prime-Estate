<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    
      <?php
require_once ("../controllers/profile_controller.php");
require_once ("../models/profile_model.php");
require_once ("../controllers/users_controller.php");
/**
        $zip = $_POST["zip"];
        $bed =  $_POST["bed"];
        $bathroom  = $_POST["bathroom"];
        $pricemax = $_POST["pricemax"];
        $pricemin = $_POST["pricemin"];
        $info = $_POST["info"];
        $id = $_POST["id"];
 */
          
            $dbRow['bedrooms'] = $_POST["bed"];
            $dbRow['bathrooms'] = $_POST["bathroom"];
            $dbRow['pricemax']= $_POST["pricemax"];
            $dbRow['pricemin']= $_POST["pricemin"];
            $dbRow['zip']  = $_POST["zip"];
            $dbRow['personalinformation']  = $_POST["info"];
            $dbRow['userid'] =  $_POST["id"];
            $profile = new profile_model($dbRow);
            $profilecontroler = new profile_controller();
            $profilecontroler->updateCustomerProfile($profile);
            header('Location: http://sfsuswe.com/~f14g03/views/profile.php');
            
        ?>
   
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    
    
    <body>
      
    </body>
</html>
