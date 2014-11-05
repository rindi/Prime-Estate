<!DOCTYPE html>

<?php
include 'navbar.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <style>

        #texttable,#update,p{   
            margin-left: 2cm;
        }



    </style>
    <body>

        <form action="" method="post" style="text-align:left; margin: 0px auto">
            <p><center>
                <b><font size="5">MY PROFILE</font>
            </center></p>
        <p>SEARCH INFORMATION </p>
        <table id ="texttable">
            <tr>
                <td>Price:</td>
                <td><input id = "textfield"type="text" name="price" ></td>
            </tr>

            <tr>
                <td>zip:</td>
                <td><input id = "textfield"type="text" name="zip" ></td>
            </tr>
            <tr>
                <td>Bed:</td>
                <td><input id = "textfield"type="text" name="bed" ></td>
            </tr>

            <tr>
                <td>Room:</td>
                <td><input id = "textfield"type="text" name="room" ></td>
            </tr>





        </table>
        <br>
        <center> <input id = "update"type="submit" value = "UPDATE" > </center>
        <br><br>
    </form>



    <form action="" method="post" style="text-align:left; margin: 0px auto">
        <p><b>PERSONAL INFORMATION</b> </p>

        <p>
            <textarea name="info" rows="20" cols="80"></textarea>
        </p>
        <center><input id = "update" type="submit" value = "UPDATE" ></center>
    </form>
</body>

</html>
