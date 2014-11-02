<?php
//require ("../controllers/controller.php");
require ("../controllers/users_controller.php");
//$db = new Controller();
$user_contr = new UsersController();
$users = $user_contr->getUsers();
print_r($user_contr);
echo "<br>";
//print_r($users);

$users['username'] = "chuck norris";
print_r($users[0]);

//test user creation
$user_contr->addUser($users[0]);