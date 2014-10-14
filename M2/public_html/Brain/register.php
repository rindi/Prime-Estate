<?php
   
    #require 'Brain/dbconfig.php';
    $con=mysqli_connect("sfsuswe.com","f14g03","fzR-5NY-5oM-W2y","student_f14g03");
    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $un = mysqli_real_escape_string($con, $_POST['username']);
    $pswd = mysqli_real_escape_string($con, $_POST['password']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $str = 'This is an encoded string';
    $encryptedpswd = base64_encode($pswd);
    $sql="INSERT INTO usertable (username, password, email) VALUES ('$un','$encryptedpswd','$email')";
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
    }
    echo " $un is now registered.";
    mysqli_close($con);
?> 
<html>
        <a href="../index.php">Click here to go home</a>
</html>