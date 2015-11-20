<?php
    class dbconnect
    {
        function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        function getUser()
        {
            $query = $this->pdo->prepare('SELECT * FROM usertable');
            $query->execute();
            return $query->fetchAll();
        }
        
        function createUser($name, $password) {
            $name = $this->real_escape_string($name);
            $password = $this->real_escape_string($password);
            $query = $this->pdo->prepare('INSERT INTO usertables (username,password) VALUES ('.$name.','.$password.')');
        }
    }
?>