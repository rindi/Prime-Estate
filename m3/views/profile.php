<!DOCTYPE html>
<?php
include 'navbar.php';
require_once ("../controllers/profile_controller.php");
require_once ("../models/profile_model.php");
require_once ("../controllers/users_controller.php");

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
//$usercontroller = new users_controller();
//$username = $_POST["login_username"];
//$password = $_POST["login_password"];

//$encryptedpassword = md5($password);
//$userlist = $usercontroller->getUsers();

//        if( $get_users = $db_connect->query("SELECT * FROM usertable") )
//        {
//    while( $row = $get_users->fetch(PDO::FETCH_OBJ) )
        //foreach ($userlist as $row) 
        //{
          //  if( $row->getUserName() == $username && $row->getUserPassword() == $encryptedpassword )
            //{
              //  session_start();
                //$_SESSION["username"] = $username;
                //$loggedin = true;
            //}
        //}
//        }
        
 
//$profilecontroller = new profile_controller();
//GET THE CUSTOMER ID SOMEHOW (prolly cookies)
//$customerid = $_COOKIE['username'];
//GET THEIR PROFILE
//$profile = $profilecontroller->getProfile($_SESSION["username"]);
//UPDATE THEIR PROFILE WITH WHATEVER CHANGES THEY MAKE
//$newValue = 2000;
//$profile->setPricemax($newValue);
//$profile->setPricemin($newValue);
//$profilecontroller->updateCustomerProfile($profile);

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
       #div1 {
    margin-left: 2cm;
    width: 500px;
    height: 150px;
    
    overflow-x: hidden;
    }



    </style>
    <body>
        
     <?php
     $userid =$_SESSION["username"];
      $profilecontroller = new profile_controller();
      $usercontroller = new users_controller();
     $id = $usercontroller->getUserId($userid);
     $profile = $profilecontroller->getProfile(($id));
    
     
     ?>
        <form id = "f1" action="profilehandler.php" method="post" style="text-align:left; margin: 0px auto">
            <p><center>
                <b><font size="5">MY PROFILE</font>
            </center></p>
        <p>SEARCH INFORMATION </p>
        <table id ="texttable">
            <tr>
                <td>Price: Min </td>
                <td><input id = "textfield"type="text" name="pricemin" value ="<?php echo $profile->pricemin?>"></td>
                <td> Max &nbsp; </td>
                <td><input id = "textfield"type="text" name="pricemax" value ="<?php echo $profile->pricemax?>" ></td>
            </tr>

            <tr>
                <td>Zip Code:</td>
                <td><input id = "textfield"type="text" name="zip"value ="<?php echo $profile->zip?>" ></td>
            </tr>
            <tr>
                <td>Bedrooms:</td>
                <td><input id = "textfield"type="text" name="bed"value ="<?php echo $profile->bedrooms?>" ></td>
            </tr>

            <tr>
                <td>Bathrooms:</td>
                <td><input id = "textfield"type="text" name="bathroom" value ="<?php echo $profile->bathrooms?>"></td>
            </tr>


        </table>
       
 
        <p><b>PERSONAL INFORMATION</b> </p>

        <p>
   
        
        <div class="form-group" id ="div1" >
            
            <textarea class="form-control"  cols="60"rows="10" name = "info" id="info"><?php echo $profile->personalinformation?></textarea>
        </div>
        </p>
         
         
        
        <input name = "id" type = "hidden"value  =<?php echo $id ?>>
         <center><input id = "update" type="submit" value = "update" ></center>
         
      
         
        </form>
        
        
        
    
        
</body>

</html>

