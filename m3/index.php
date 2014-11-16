<?php
include 'views/navbar.php';
?>
<html>
    <head>
        <title> Prime Estate </title>
    </head>
    <body>
        <div class=""container>
          <div class="well well-lg col-xs-offset-1 col-xs-10">
            <h1 align="center">
                Welcome to Prime Estate.
            </h1>
            <form class="form-horizontal" style="text-align:center; margin: 0px auto" action="views/search_results.php" method="POST">
                <div class="form-group">
                    <div class="col-xs-offset-3 col-xs-5">
                      <input type="search" name="searchvalue" class="form-control">
                    </div>
                    <label for="submit-form" class="btn btn-default btn-lg col-xs-1"><i class="glyphicon glyphicon-search"></i></label>
                    <input id="submit-form" type="submit" class="btn btn-inverse col-xs-1 hidden">
                </div>
            </form>
          </div>
        </div>
    </body>
</html>
