<?php
require_once ("../controllers/users_controller.php");

$usercontroller = new users_controller();
$username = $_POST["login_username"];
$password = $_POST["login_password"];
$encryptedpassword = md5($password);
$userlist = $usercontroller->getUsers();
$link = '"http://sfsuswe.com/~f14g03/views/';
$end = '.php"';
    foreach ($userlist as $row) 
        {
            if( $row->getUserName() == $username && $row->getUserPassword() == $encryptedpassword )
            {
                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["type"] = $row->getUserType();
                if($_SESSION["type"]==1)
                    $redirect='profile';
                else if ($_SESSION["type"]==2)
                    $redirect='dashboard';
                else if ($_SESSION["type"]==3)
                    $redirect='admin';
                $loggedin = true;
                echo $username;
                echo $_SESSION["type"];
            }
        }
$finalurl = $link . $redirect . $end;    
echo $finalurl;
?>
<html>
    <a href = <?php echo $finalurl;?> >Link</a>
    
</html>
<!--<script type="text/javascript">window.location = "http://sfsuswe.com/~f14g03/views/"<?php echo $redirect;?>".php";</script>-->

<!--
//
//        if($_SESSION["type"]==1)
//        ?><script type="text/javascript">alert("Buyer");window.location = 'http://sfsuswe.com/~f14g03/views/profile.php';</script><?php
//    
//        if($_SESSION["type"]==2)
//        ?><script type="text/javascript">alert("Realtor");window.location = 'http://sfsuswe.com/~f14g03/views/dashboard.php';</script><?php
//        
//        if($_SESSION["type"]==3)
//        ?><script type="text/javascript">alert("Admin");window.location = 'http://sfsuswe.com/~f14g03/views/admin.php';</script>

            -->