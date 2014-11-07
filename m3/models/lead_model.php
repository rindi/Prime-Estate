<?php

/**
 * user_model Class
 */
class lead_model
{
    //fields for userdata class
    public $firstname, $lastname, $phone, $email, $date;
    
    public function __construct($input)
    { 
        $this->firstname = $input['firstname'];
        $this->lastname = $input['lastname'];
        $this->phone = $input['phone'];
        $this->email = $input['email'];
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    } 
    public function setContactDate($date)
    {
        $this->date = $date;
    }
    public function getContactDate()
    {
        return $this->date;
    }
    public function getFirstname()
    {
        return $this->firstname;
    }
    public function getLastname()
    {
        return $this->lastname;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }   
}

?>
