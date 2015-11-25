<?php
/*
  @(#)File:           Login Handler
  @(#)Purpose:        Controls User Login
  @(#)Author:         PrimeEstate
  @(#)Product:        PrimeEstate Website 2014
 */

require_once ("../controllers/users_controller.php");
require_once ("../controllers/listings_controller.php");
//include("navbar.php");
$usercontroller = new users_controller();
$username = $_POST["login_username"];
$password = $_POST["login_password"];

if ($username == NULL || $password == NULL)
    echo "Login failed, please fill values for all required fields.";
$encryptedpassword = md5($password);
$userlist = $usercontroller->getUsers();
$link = '"http://sfsuswe.com/~f14g03/views/';
$end = '.php"';
$successflag = 0;
foreach ($userlist as $row) {
    if ($row->getUserName() == $username && $row->getUserPassword() == $encryptedpassword) {
        if ($_SESSION["type"] == 1) {
            header('Location: http://sfsuswe.com/~f14g03/views/profile.php');
        } else if ($_SESSION["type"] == 2) {
            header('Location: http://sfsuswe.com/~f14g03/views/search_results.php?rid=1');
        } else if ($_SESSION["type"] == 3) {
            header('Location: http://sfsuswe.com/~f14g03/views/admin.php');
        }
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["type"] = $row->getUserType();
        $_SESSION["userid"] = $row->getUserId();

        echo $_SESSION["username"] . '<br>';
        echo $_SESSION["type"] . '<br>';
        echo $_SESSION["userid"] . '<br>';
        if ($_SESSION["type"] == 1) {
            header('Location: http://sfsuswe.com/~f14g03/views/profile.php');
        } else if ($_SESSION["type"] == 2) {
            header('Location: http://sfsuswe.com/~f14g03/views/search_results.php?rid=1');
        } else if ($_SESSION["type"] == 3) {
            header('Location: http://sfsuswe.com/~f14g03/views/admin.php');
        }
        $loggedin = true;
        $successflag = 1;
        //$finalurl = $link . $redirect . $end;
    }
}

if ($successflag == 0) {
    echo "User/Password are incorrect, please check your inputs and try again";
}
?>

<!--<script type="text/javascript">
    var php_var = "<?php echo $finalurl; ?>";
    window.location = php_var;
</script>-->
