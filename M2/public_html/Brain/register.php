<?php
    /*
#require 'Brain/dbconfig.php';
    $con=mysqli_connect("sfsuswe.com","f14g03","fzR-5NY-5oM-W2y","student_f14g03");
    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    echo $_POST["username"];
    #$un= $_POST["username"];
    $un = mysqli_real_escape_string($con, $_POST['username']);
    echo $_POST["password"];
    #$pswd=$_POST["password"];
    $pswd = mysqli_real_escape_string($con, $_POST['password']);
    echo $_POST["email"];
    #$email=$_POST["email"];
    $email = mysqli_real_escape_string($con, $_POST['email']);
    #$sql="INSERT INTO usertable (username, password, email) VALUES ('$un','$pswd','$email')";
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
    }
    echo "1 record added";
    mysqli_close($con);    */
?>