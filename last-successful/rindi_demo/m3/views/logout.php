<?php

/*
@(#)File:           Logout
@(#)Purpose:        Controls User Logging out
@(#)Author:         PrimeEstate
@(#)Product:        PrimeEstate Website 2014
*/

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['type'])) {
    $type = $_SESSION['type'];
    $username = $_SESSION['username'];
    }
else
    $type = 0;

session_unset(); 
session_destroy();
header('Location: http://sfsuswe.com/~f14g03/index.php');
?>
<!DOCTYPE html>
<html>
<body>

<?php

?>

</body>
</html>