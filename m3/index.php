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
        <form class="form-horizontal" style="text-align:center; margin: 0px auto" action="views/searchresults.php" method="POST">
            <div class="form-group">
                <div class="col-xs-offset-3 col-xs-5">
                  <input type="search" name="searchvalue" class="form-control  col-xs-5">
                </div>
                <input type="submit" class="btn btn-inverse col-xs-1" value="Find home">
            </div>
          
        <!--<span class="glyphicon glyphicon-search"></span>-->
        </input>
        </form>
    </body>
</html>
<?php
include 'views/data_usage.php';
?>