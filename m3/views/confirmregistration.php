<?php
#include 'views/navbar.php';
require_once '../controllers/users_controller.php';
require_once '../models/user_model.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $username = $_POST['login_username'];
    $password = base64_encode($_POST['login_password']);
    $confirm_password = base64_encode($_POST['login_confirm_password']);
    $email = $_POST['login_email'];
    if(isset($_POST['first_name']))
        $first_name = $_POST['first_name'];
    else
        $first_name = $username;
    $last_name = $_POST['last_name'];
    
//    $input[0] = $username;
//    $input[1] = $password;
//    $input[2] = 1;
//    $input[3] = $email;
//    $input[4] = $first_name;
//    $input[5] = $last_name;
    $input['username'] = $username;
    $input['password'] = $password;
    $input['type'] = 1;
    $input['email'] = $email;
    $input['firstname'] = $first_name;
    $input['lastname'] = $last_name;
    $user = new user_model($input);
//    for ($i=0;$i<6;$i++)
//    {
//        //echo $i;
//        echo $input[$i];
//    }
    if ($username == NULL || $password == NULL) 
        echo "Registration failed, please fill values for all required fields.";
    if ($password != $confirm_password) 
        echo "Registration failed, passwords did not match.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        echo "Registration failed, email ID is not valid.";
    //alphanumeric characters and underscores, 2 to 16 characters long.
    $allowed = array(".", "-", "_");
    if(ctype_alnum( str_replace($allowed, '', username )))
        echo "Registration failed, username is not valid.";
    else
    {
        $registration_controller = new users_controller();
        $registration_controller->addUser($user);
        echo 'Done';
    }