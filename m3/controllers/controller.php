<?php

class Controller
{
    protected $db_connect;
    
    public function __construct() 
    {
        $db_name = 'student_f14g03';
        $db_username = 'f14g03';
        $db_password = 'fzR-5NY-5oM-W2y';
        $db_host = 'localhost';
        $db_connect = new PDO("mysql:host=".$db_host.";dbname=".$db_name, $db_username, $db_password);
        
        /* test connection */
        //if( $db_connect == true ) echo "CONNECTED TO DB JUST FINE. first one";
    }
}

?>