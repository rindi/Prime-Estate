<?php

class UserData
{
    //fields for userdata class
    private $username, $password, $userid, $type, $email;
    public function __construct($dbRow)
    {
        $this->username = $dbRow['username'];
        $this->password = $dbRow['password'];
        $this->userid = $dbRow['userid'];
        $this->email = $dbRow['type'];
        $this->type = $dbRow['email'];
        
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
    public function getEmail()
    {
        return $this->email;
    }
}

?>