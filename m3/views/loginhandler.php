<?php
require_once ("../controllers/users_controller.php");
include("navbar.php");

$usercontroller = new users_controller();
$username = $_POST["login_username"];
$password = $_POST["login_password"];
if ($username == NULL || $password == NULL)
    echo "Login failed, please fill values for all required fields.";
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
                    header('Location: http://sfsuswe.com/~f14g03/views/profile.php');
                else if ($_SESSION["type"]==2)
                    header('Location: http://sfsuswe.com/~f14g03/views/dashboard.php');
                else if ($_SESSION["type"]==3)
                    header('Location: http://sfsuswe.com/~f14g03/views/admin.php');
                $loggedin = true;
                
                $finalurl = $link . $redirect . $end;
            }
            else
            {
                echo "User/Password are incorrect, please check your inputs and try again";
                $finalurl = "http://sfsuswe.com/~f14g03/views/login.php";
            }
        }
?>
<script type="text/javascript">
    var php_var = "<?php echo $finalurl; ?>";
    window.location = php_var;
</script>

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