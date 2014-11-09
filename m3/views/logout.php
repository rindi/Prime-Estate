<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<body>

<?php
session_start();
session_unset(); 
session_destroy(); 
?>

</body>
</html>