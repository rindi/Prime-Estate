<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<body>

<?php
session_unset(); 
session_destroy();
header('Location: http://sfsuswe.com/~f14g03/index.php');

?>

</body>
</html>