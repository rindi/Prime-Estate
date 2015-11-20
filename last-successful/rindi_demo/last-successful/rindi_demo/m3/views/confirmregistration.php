<?php

/*
@(#)File:           Confirm Registration
@(#)Purpose:        Confirms User Registration
@(#)Author:         PrimeEstate
@(#)Product:        PrimeEstate Website 2014
*/

include 'navbar.php';
require_once '../controllers/users_controller.php';
require_once '../models/user_model.php';
if (isset($_POST['type']))
    $type=2;
else
    $type=1;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $username = $_POST['login_username'];
    $password = md5($_POST['login_password']);
    $confirm_password = md5($_POST['login_confirm_password']);
    $email = $_POST['login_email'];
    if(isset($_POST['first_name']))
        $first_name = $_POST['first_name'];
    else
        $first_name = $username;
    $last_name = $_POST['last_name'];
    
    $input['username'] = $username;
    $input['password'] = $password;
    $input['type'] = $type;
    $input['email'] = $email;
    $input['firstname'] = $first_name;
    $input['lastname'] = $last_name;
    $user = new user_model($input);
    
    if ($username == NULL || $password == NULL)
        echo "<h2>Registration failed, please fill values for all required fields.</h2> ";
    if ($password != $confirm_password)
        echo "<h2>Registration failed, passwords did not match.</h2>";
        #echo $password;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        echo "<h2>Registration failed, email ID is not valid.</h2>";
    //  alphanumeric characters and underscores, 2 to 16 characters long.
    //    $allowed = array(".", "-", "_");
    //    if(ctype_alnum( str_replace($allowed, '', username )))
    //        echo "Registration failed, username is not valid.";
    else
    {
        $_SESSION["username"] = $username;
        $_SESSION["type"] = $type;
        $registration_controller = new users_controller();
        if($registration_controller->getUserNameInfo($username)==NULL)
        {
            $registration_controller->addUser($user);
            $userid = $registration_controller->getUserId($username);
            if ($_SESSION["type"] == 1)
            {
                $_SESSION["userid"] = $userid;
                echo '<meta http-equiv="refresh" content="0; url=http://sfsuswe.com/~f14g03/views/profile.php" />';
            }
            else
            {
                echo '<meta http-equiv="refresh" content="0; url="http://sfsuswe.com/~f14g03/views/search_results?rid='.$userid.'.php" />';
            }
        }
        else
        {
            echo '<h2 align="center">Registration failed, user already exists.</h2>';
            $_SESSION["type"]=0;
            //header('Location: http://sfsuswe.com/~f14g03/views/login.php');
        }
    }