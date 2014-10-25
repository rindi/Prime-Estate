<?php
require ("UserData.php");
class Database
{
    private $con;
    public function __construct()
    {
        $database = 'student_f14g03';
        $username = 'f14g03';
        $password = 'fzR-5NY-5oM-W2y';
        $host = 'localhost';
        //'mysql:host=localhost;dbname=student_f14g03', 'f14g03','fzR-5NY-5oM-W2y'
        //$this->con = new PDO("mysql:host=".$host.";dbname=".$database,$username,$password);
        $this->con = new PDO("mysql:host=".$host.";dbname=".$database,$username,$password);
    }
    public function getUsers()
    {
        $sql = "SELECT * from usertable";
        foreach ($this->con->query($sql) as $row) 
        {
            print $row['username'] . "\t";
            print $row['password'] . "\t";
            print $row['userid'] . "\t";
            print $row['type'] . "\t";
            print $row['userid'] . "\n";
        }
//        $statement = $this->con->prepare($sql);
//        $statement-> execute();
//        while($row = $statement -> fetch())
//        {
//            $dataSet[] = new UserData($row);
//        }
        if (!empty($dataSet))
            return $dataSet;
        else
            return null;
    }
}
?>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

