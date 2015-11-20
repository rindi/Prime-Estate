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
            $dbRow['bedrooms'] = $_POST["bed"];
            $dbRow['bathrooms'] = $_POST["bathroom"];
            $dbRow['pricemax']= $_POST["pricemax"];
            $dbRow['pricemin']= $_POST["pricemin"];
            $dbRow['zip']  = $_POST["zip"];
            $dbRow['city']  = $_POST["city"];
    
    ?>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
