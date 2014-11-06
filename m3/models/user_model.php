<?php

/**
 * user_model Class
 */
class user_model
{
    //fields for userdata class
    public $username, $password, $userid, $type, $email, $date, $firstname, $lastname;
    
    public function __construct($dbRow)
    { 

        if (count($dbRow)>6)
        {
            $this->userid = $dbRow['userid'];
        }
        $this->username = $dbRow['username'];
        $this->password = $dbRow['password'];
        $this->email = $dbRow['email'];
        $this->type = $dbRow['type'];
        $this->firstname = $dbRow['firstname'];
        $this->lastname = $dbRow['lastname'];


    }
    public function getUserName()
    {
        return $this->username;
    }
    public function setUserName($username)
    {
        $this->username = $username;
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
    public function setUserEmail($email)
    {
        $this->email = $email;
    }
    public function getContactDate()
    {
        return $this->date;
    }
    public function getFirstName()
    {
        return $this->firstname;
    }
    
    public function getLastName()
    {
        return $this->lastname;
    }
    
    public function setUserPassword($password)
    {
        $this->password = base64_encode($password);
    }
    
    public function setContactDate($date)
    {
        $this->date = $date;
    }
    public function setFirstName($firstname)
    {
        $this->firstname = $firstname;
    }
    
    public function setLastName($lastname)
    {
        $this->lastname = $lastname;
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