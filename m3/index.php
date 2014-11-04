<?php
include 'views/navbar.php';
?>
<html>
    <head>
        <title> Prime Estate </title>
    </head>
    <body>
        <h1 align="center">
            Welcome to Prime Estate.
        </h1>
        <form style="text-align:center; margin: 0px auto" action="views/searchresults.php" method="POST">
        <input type="search" name="searchvalue">
        <input type="submit" class="btn btn-inverse" value="Find home">
        <!--<span class="glyphicon glyphicon-search"></span>-->
        </input>
        </form>
    </body>
</html>
<?php
include 'views/data_usage.php';
?>