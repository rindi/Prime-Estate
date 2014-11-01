<?php

class user_model
{
    //fields for userdata class
    private $username, $password, $userid, $type, $email;
    
    public function __construct($dbRow)
    { 
        //if USER is new, they don't have id
        if (count($dbRow)>4)
        {
            $this->userid = $dbRow['userid'];
        }
        $this->username = $dbRow['username'];
        $this->password = $dbRow['password'];
        $this->email = $dbRow['email'];
        $this->type = $dbRow['type'];
    }
    public function getUserName()
    {
        return $this->username;
    }
    public function getUserPassword()
    {
        return $this->password;
    }
    public function getUserId()
    {
        return $this->userid;
    }
    public function getUserType()
    {
        return $this->type;
    }
    public function getUserEmail()
    {
        return $this->email;
    }
    public function setUserPassword($password)
    {
        $this->password = $password;
    }
}

?>