<?php
#include 'views/navbar.php';
require '../controllers/users_controller.php';
#require '../models/user_model.php';

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
    
    $input[0] = $username;
    $input[1] = $password;
    $input[2] = 1;
    $input[3] = $email;
    $input[4] = $first_name;
    $input[5] = $last_name;
    
    for ($i=0;$i<6;$i++)
    {
        //echo $i;
        echo $input[$i];
    }
    if ($password != $confirm_password)
        echo "Passwords did not match, Registration failed.";
    else
    {
        $registration_controller = new registration_controller();
        $registration_controller->addUser($input);
    }