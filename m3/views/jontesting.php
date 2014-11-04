<?php
include 'views/navbar.php';
$value = 54;
session_start();
$_SESSION['varname'] = $value;
?>
<html>
    <head>
        <title> Prime Estate </title>
    </head>
    <body>
        <h1 align="center">
            Welcome to Prime Estate.
        </h1>
        <a href='interestedcustomers.php'>click</a>
        </input>
        </form>
    </body>
</html>
<?php
include 'views/data_usage.php';
?>