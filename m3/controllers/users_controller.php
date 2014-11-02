<?php
require ("../controllers/controller.php");
require ("../models/user_model.php");
class UsersController extends Controller
{
    public function __construct( ) 
    {
        parent::__construct();
        /* test if connected to db */
        // if( parent::$this->db_connect ) echo "this is finally working";
    }
    
    public function getUsers()
    {   
        $sql = "SELECT * from usertable";
        foreach( parent::$this->db_connect->query($sql) as $row )
            $dataSet[] = new user_model($row);
        
        //print_r($dataSet[0]);
        
        $dataSet[1]['username'] = "a";
        $dataSet[1]['password'] = "b";
        $dataSet[1]['email'] = "c";
        $dataSet[1]['type'] = "d";
        //print_r($dataSet[1]);
        
        return $dataSet;
    }
    
    public function addUser($input)
    {
        $sql = "INSERT INTO 
                usertable (username, password, type, email) 
                VALUES (:username, :password, :type, :email)";
        
        $q = $this->db_connect->prepare($sql);
        $q->execute(array
                        (':username'    => $this->setUsername(),
                         ':password'    => $input->getUserPassword(),
                         ':type'        => $input->getUserType(),
                         ':email'       => $input->getUserEmail() 
                        )
                    );
        
    }
    

}
