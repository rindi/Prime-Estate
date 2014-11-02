<?php
//require ("../controllers/controller.php");
require ("../controllers/users_controller.php");
//$db = new Controller();
$user_contr = new UsersController();
$users = $user_contr->getUsers();
print_r($user_contr);
echo "<br>";
//print_r($users);

foreach($users as $user)
{
    print_r($user);
}

//test user creation
$test_add_user = new Model();
$temp = $test_add_user->testAddUser();
$user_contr->addUser($temp);