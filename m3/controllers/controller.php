<?php

class Controller
{
    private $db_connect;
    
    public function __construct() 
    {
        $db_name = 'student_f14g03';
        $db_username = 'f14g03';
        $db_password = 'fzR-5NY-5oM-W2y';
        $db_host = 'localhost';
        $this->db_connect = new PDO("mysql:host=".$db_host.";dbname=".$db_name, $db_username, $db_password);
        
        /* test connection */
        if( $db_connect )
        {
            echo "CONNECTED TO DB JUST FINE.";
        }
    }
}

?>