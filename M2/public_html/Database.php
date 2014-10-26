<?php
require ("UserData.php");
require ("ListingData.php");
class Database
{
    private $con;
    
    /**
     * Constructor for the databse object
     */
    public function __construct()
    {
        $database = 'student_f14g03';
        $username = 'f14g03';
        $password = 'fzR-5NY-5oM-W2y';
        $host = 'localhost';
        $this->con = new PDO("mysql:host=".$host.";dbname=".$database,$username,$password);
    }
    
    /**
     * Get Users from the Database
     * @return \UserData
     */
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
    
    /**
     * Add new User:Customer
     * @param type $input
     */
    public function addUser($input)
    {
        $sql = "INSERT INTO usertable(username, password, type, email) VALUES (
            :username, :password, :type, :email)";
                                          
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':username', $input['username'], PDO::PARAM_STR);       
        $stmt->bindParam(':password', $input['password'], PDO::PARAM_STR); 
        $stmt->bindParam(':type', $input['type'], PDO::PARAM_STR); 
        $stmt->bindParam(':email', $input['email'], PDO::PARAM_STR);   
        
        $stmt->execute();  
    }
    
    /**
     * Search Listings
     * @param type $input
     * @return \ListingData
     */
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
 
    /**
     * Add a Listing to the Database
     * @param type $input
     */
    public function addListing($input)
    {
        $sql = "INSERT INTO houses(address, city, zip, price, rooms, bathrooms, 
            description, when_added, when_modified) VALUES (
            :address, :city, :zip, :price, :rooms, :bathrooms, 
            :description, :when_added, :when_modified)";
                                          
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':address', $input['address'], PDO::PARAM_STR);       
        $stmt->bindParam(':city', $input['city'], PDO::PARAM_STR); 
        $stmt->bindParam(':zip', $input['zip'], PDO::PARAM_INT);  
        $stmt->bindParam(':price', $input['price'], PDO::PARAM_INT); 
        $stmt->bindParam(':rooms', $input['rooms'], PDO::PARAM_INT);   
        $stmt->bindParam(':bathrooms', $input['bathrooms'], PDO::PARAM_INT); 
        $stmt->bindParam(':description', $input['description'], PDO::PARAM_STR);   
        $stmt->bindParam(':when_added', $input['when_added'], PDO::PARAM_STR); 
        $stmt->bindParam(':when_modified', $input['when_modified'], PDO::PARAM_STR);   

        $stmt->execute();       
    }

    /**
     * Delete a Listing from the database
     * @param type $id
     */
    public function deleteListing($id)
    {
        $sql = "DELETE FROM houses WHERE id =  :id";
        $stmt = $this->con->prepare($sql);
        //$stmt->bindParam(':id', $id, PDO::PARAM_STR, 12);   
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);   
        $stmt->execute();
    }
}
?>


