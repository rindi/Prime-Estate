<?php

/*
@(#)File:           Change Password
@(#)Purpose:        Change User's Password
@(#)Author:         PrimeEstate
@(#)Product:        PrimeEstate Website 2014
*/

require_once ("../controllers/users_controller.php");
include("navbar.php");

if (isset($_POST['SubmitButton'])) {

    $username = $_SESSION['username'];
    $currentPassword = $_POST['currentPassword'];
    $question = $_POST['question'];
    $encryptedpassword = md5($currentPassword);
    $answer = $_POST['answer'];
    print_r($_POST);
    $usercontroller = new users_controller();
    $userlist = $usercontroller->getUsers();
    $flag = 0;
    echo $question;
    echo $answer;
    
        foreach ($userlist as $row) 
        {
            if( $row->getUserName() == $username && $row->getUserPassword() == $encryptedpassword )
            {
                $flag = 1;
                $row->setUserQuestion($question);
                $row->setUserAnswer($answer);
                print_r($row);
            }
        }
        if ($flag==0)
            echo '<script language="javascript"> alert("Current Password is incorrect");</script>';
        }
    
?>
<html>
<head>
<title>PrimeEstate - Forgot Password details </title>
</head>
<body>
    <div class="container-fluid">
    <div id="box" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" >
    <div class="panel-heading" style="border: 1px solid;border-color: 000;">
        <h3 class="panel-title" style="color: fff;">Password change menu</h3>
    </div>
    <div class="panel-body" style="border: 1px solid;border-color:#12ACA5;">
    <form action="questionanswer.php" method="post">
    <div class="form-group">
        <input type="password" class="form-control input-lg" name="currentPassword" placeholder="Current Password" required>
    </div>
        
    <div class="form-group">
        <input type="text" class="form-control input-lg" name="question" placeholder="Enter a question for which you'll remember the answer!" required>
    </div>

    <div class="form-group">
        <input type="text" class="form-control input-lg" name="answer" placeholder="Enter your answer" required>
    </div>

    <div class="form-group" align="center" style="margin-bottom: 10px">
        <input type="submit" name = "SubmitButton" class="btn btn-default" value="Save question and answer" align="center">
    </div>
    </form>
    </div>
    </div>    
    </div>
</body>
</html>