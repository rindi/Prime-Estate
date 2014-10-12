<?php
    //Enter your database connection details here.
    $host = 'localhost'; //HOST NAME.
    $db_name = 'student_f14g03'; //Database Name
    $db_username = 'f14g03'; //Database Username
    $db_password = 'fzR-5NY-5oM-W2y'; //Database Password

    try
    {
        $pdo = new PDO('mysql:host='. $host .';dbname='.$db_name, $db_username, $db_password);
    }
    catch (PDOException $e)
    {
        exit('Error Connecting To DataBase');
    }
?>