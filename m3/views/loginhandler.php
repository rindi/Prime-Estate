<?php
require_once ("../controllers/users_controller.php");

$usercontroller = new users_controller();
$username = $_POST["login_username"];
$password = $_POST["login_password"];
$encryptedpassword = md5($password);
$userlist = $usercontroller->getUsers();

    foreach ($userlist as $row) 
        {
            if( $row->getUserName() == $username && $row->getUserPassword() == $encryptedpassword )
            {
                session_start();
                echo $row->getUserName();
                echo $row->getUserType();
                $_SESSION["username"] = $username;
                $_SESSION["type"] = $row->getUserType();
                $loggedin = true;
            }
        }

        if($_SESSION["type"]==1)
        ?><script type="text/javascript">alert("Buyer");window.location = 'http://sfsuswe.com/~f14g03/views/profile.php';</script><?php
    
        if($_SESSION["type"]==2)
        ?><script type="text/javascript">alert("Realtor");window.location = 'http://sfsuswe.com/~f14g03/views/dashboard.php';</script><?php
        
        if($_SESSION["type"]==3)
        ?><script type="text/javascript">alert("Admin");window.location = 'http://sfsuswe.com/~f14g03/views/admin.php';</script>

            