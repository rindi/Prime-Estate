<?php
require ("../controllers/controller.php");
require ("../models/user_model.php");
class users_controller extends Controller
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
        {
            $dataSet[] = new user_model($row);
        }
        //print_r($dataSet[0]);
        
        //alex testing
//        $dataSet[1]['username'] = "a";
//        $dataSet[1]['password'] = "b";
//        $dataSet[1]['email'] = "c";
//        $dataSet[1]['type'] = "d";
        //print_r($dataSet[1]);
        
        if (!empty($dataSet))
            return $dataSet;
        else
            return null;
    }
    
    public function addUser($input)
    {
        $sql = "INSERT INTO 
                usertable (username, password, type, email) 
                VALUES (:username, :password, :type, :email)";
        
        $stmt = $this->db_connect->prepare($sql);
        $stmt->bindParam(':username', $input->getUserName(), PDO::PARAM_STR);       
        $stmt->bindParam(':password', $input->getUserPassword(), PDO::PARAM_STR); 
        $stmt->bindParam(':type', $input->getUserType(), PDO::PARAM_STR); 
        $stmt->bindParam(':email', $input->getUserEmail(), PDO::PARAM_STR);   
        
        $stmt->execute();  
//        $q->execute(array
//                        (':username'    => $this->getUsername(),
//                         ':password'    => $input->getUserPassword(),
//                         ':type'        => $input->getUserType(),
//                         ':email'       => $input->getUserEmail() 
//                        )
//                    );
        
    }
    

}
