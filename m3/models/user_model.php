<?php

/**
 * user_model Class
 */
class user_model
{
    //fields for userdata class
    public $username, $password, $userid, $type, $email, $date;
    
    public function __construct($dbRow)
    { 

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
    
    public function getContactDate()
    {
        return $this->date;
    }
    
    public function setUserPassword($password)
    {
        $this->password = $password;
    }
    
    public function setContactDate($date)
    {
        $this->date = $date;
    }
    public function testAddUser()
    {
        $this->username = "test_un";
        $this->password = "test_pw";
        $this->type = "test_ut";
        $this->email = "test_em";
    }
}

?>