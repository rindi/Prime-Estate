<?php
include 'navbar.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

?>
<html>
    <head>
        <title> Upload Your image </title>
    </head>
    <body>
        <h3>
            Please select the image you wish to upload
        </h3>
        
        <!--<span class="glyphicon glyphicon-search"></span>-->
        </input>
        </form>
        <form action="uploadcomplete.php" method="post" enctype="multipart/form-data">
            Please choose a file: 
            <input type="file" name="uploadFile" id="uploadFile"><br>
            <input type="submit" value="Upload File">
        </form>
        
            <script>
            document.forms[0].addEventListener('submit', function( evt ) {
                var file = document.getElementById('uploadFile').files[0];

                if(file && file.size < 2621440) { // 10 MB (this size is in bytes)
                    //Submit form        
                } else {
                    window.alert("File size is greater than 2.5 MB");
                    evt.preventDefault();
                }
            }, false);
            </script>
    </body>
</html>