<?php

    echo $_POST["username"];
    echo $_POST["password"];
    $un=$_POST["username"];
    $pswd=$_POST["password"];
    #require_once("Brain/dbconnect.php");
    require'dbconfig.php';

    if($un == '') {
	$errmsg_arr[] = 'You must enter your Username';
	$errflag = true;
    }
    if($pswd == '') {
	$errmsg_arr[] = 'You must enter your Password';
	$errflag = true;
    }
    try
    {
        $logintest = $pdo->query('select userid from usertable where username="'.$un.'and password="'.$pswd.'"'); 
        $logintest->execute();
        $rows = $logintest->fetch(PDO::FETCH_NUM);
        if($rows>0)
        {
            echo "Logged in";
            session_start ();
        }
        else
            echo "Login failed";
    } 
    catch (Exception $ex) {
        echo "Failed login";
    }
    
    
?>
