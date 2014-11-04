<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<html>
    <head>
        <title> Upload Your image </title>
    </head>
    <body>
        <h1 align="center">
            Please select the image you wish to upload.
        </h1>
        
        <!--<span class="glyphicon glyphicon-search"></span>-->
        </input>
        </form>
        <form align="center" action="upload.php" method="post" enctype="multipart/form-data">
            Please choose a file: <input type="file" name="uploadFile"><br>
            <input type="submit" value="Upload File">
        </form>
    </body>
</html>