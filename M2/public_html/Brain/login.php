<?php
    include("dbconfig.php");
    echo $_POST["username"];
    echo $_POST["password"];
    
    $un = $_POST["username"];
    $pw = $_POST["password"];
    $encryptedpswd = base64_encode($pw);

    try
    {
        if( $get_records = $pdo->query("SELECT * FROM usertable") )
        {
            while( $row = $get_records->fetch(PDO::FETCH_OBJ) )
                {
                if( $row->username == $un && $row->password == $encryptedpswd )
                        {
                                setcookie("username", $un, time()*60, "/");
                                $loggedin = true;
                                $loggedinas = $un;
                        }
                }
        }
        
    } 
    catch (Exception $ex) {

    }
    
    echo "You are logged in. Go home to login";
    echo '<a href="../index.php"> home </a>'
?>
