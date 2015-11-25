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
        try{
                $get_records = $pdo->query("SELECT * FROM accounts");
                while( $row = $get_records->fetch(PDO::FETCH_OBJ) )
                {
                if( $row->username == $un && $row->password == $pswd )
                        {
                                setcookie("username", $un, time()*60*60, "/");
                        }
                }
        }catch(PDOException $e)
        {
                echo "exception";
                die();
        }
    } 
    catch (Exception $ex) {
        echo "Failed login";
    }
    
    
?>
