<?php
require ("UserData.php");
require ("ListingData.php");
class Database
{
    private $con;
    
    //Construct a new database object
    public function __construct()
    {
        $database = 'student_f14g03';
        $username = 'f14g03';
        $password = 'fzR-5NY-5oM-W2y';
        $host = 'localhost';
        $this->con = new PDO("mysql:host=".$host.";dbname=".$database,$username,$password);
    }
    
    //Get Users from the database
    public function getUsers()
    {
        $sql = "SELECT * from usertable";
        foreach ($this->con->query($sql) as $row) 
        {
            $dataSet[] = new UserData($row);
        }
        if (!empty($dataSet))
            return $dataSet;
        else
            return null;
    }
    
    //Get housese from the database
    public function searchListings($input)
    {
        $sql = "SELECT * from houses WHERE city = '$input' OR zip = '$input'";
        foreach ($this->con->query($sql) as $row) 
        {
            $dataSet[] = new ListingData($row);
        }
        if (!empty($dataSet))
            return $dataSet;
        else
            return null;
    }
    
}
?>


