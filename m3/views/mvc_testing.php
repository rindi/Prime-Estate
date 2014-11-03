<?php
//require ("../controllers/controller.php");
require ("../controllers/users_controller.php");
//$db = new Controller();
$user_contr = new UsersController();
$users = $user_contr->getUsers();
//print_r($user_contr);
//echo "<br>";
//print_r($users);
foreach($users as $data)
{
    echo "<p>";
    echo "UserName: ".$data->getUserName();
    echo "PassWord: ".$data->getUserPassword();
    echo "UserID: ".$data->getUserId();
    echo "UserType: ".$data->getUserType();
    echo "</p>";
}

//ADD USER
echo '<p>ADD</p>';
$registration['username'] = "Mocha"; 
$registration['password'] = "ahhahaha";
$registration['type'] = "customer";
$registration['email'] = "ohno@asmdoann.com";
$newUser = new user_model($registration);
$user_contr->addUser($newUser);

//$users['username'] = "chuck norris";
//print_r($users[0]);

//test user creation
//$user_contr->addUser($users[0]);