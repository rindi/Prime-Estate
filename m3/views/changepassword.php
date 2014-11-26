<?php
require_once ("../controllers/users_controller.php");
include("navbar.php");
ob_start();
/**
 * Description of changepassword
 *
 * @author rushabindi
 */

if (isset($_POST['SubmitButton'])) {

    $username = $_SESSION['username'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $md5newpassword = md5($newPassword);
    $input['username'] = $_SESSION['username'];
    $input['password'] = $md5newpassword;

//    $input['bathrooms'] = $_POST['bathrooms'];
//    $input['description'] = $_POST['description'];
//    $input['userid'] = $_SESSION['userid'];
    
    
    $usercontroller = new users_controller();
    $encryptedpassword = md5($currentPassword);
    $userlist = $usercontroller->getUsers();
    $flag = 0;
    if($newPassword==$confirmPassword)
    {
        foreach ($userlist as $row) 
        {
            if( $row->getUserName() == $username && $row->getUserPassword() == $encryptedpassword )
            {
                $flag = 1;
                $usercontroller->changePassword($input);
                echo '<script language="javascript"> alert("Password is changed");</script>';
                header('Location: http://sfsuswe.com/~f14g03/views/profile.php');
            }
        }
        if ($flag==0)
            echo '<script language="javascript"> alert("Current Password is incorrect");</script>';
    }
    else
        echo '<script language="javascript"> alert("Passwords did not match");</script>';
    }
?>
<html>
<head>
<title>Change Password</title>

<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
currentPassword.focus();
document.getElementById("currentPassword").innerHTML = "required";
output = false;
}
else if(!newPassword.value) {
newPassword.focus();
document.getElementById("newPassword").innerHTML = "required";
output = false;
}
else if(!confirmPassword.value) {
confirmPassword.focus();
document.getElementById("confirmPassword").innerHTML = "required";
output = false;
}
if(newPassword.value != confirmPassword.value) {
newPassword.value="";
confirmPassword.value="";
newPassword.focus();
document.getElementById("confirmPassword").innerHTML = "Not same";
output = false;
} 	
return output;
}
</script>    
</head>
<body>
    <div class="container-fluid">
    <div id="box" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" >
    <div class="panel-heading" style="border: 1px solid;border-color: 000;">
        <h3 class="panel-title" style="color: fff;">Password change menu</h3>
    </div>
    <div class="panel-body" style="border: 1px solid;border-color:#12ACA5;">
    <form action="changepassword.php" method="post">
    <div class="form-group">
        <input type="password" class="form-control input-lg" name="currentPassword" placeholder="Current Password" required>
    </div>

    <div class="form-group">
        <input type="password" class="form-control input-lg" name="newPassword" placeholder="New Password" required>
    </div>

    <div class="form-group">
        <input type="password" class="form-control input-lg" name="confirmPassword" placeholder="Confirm New Password" required>
    </div>

    <div class="form-group" align="center" style="margin-bottom: 10px">
        <input type="submit" name = "SubmitButton" class="btn btn-default" value="Change Password" align="center">
    </div>
    </form>
    </div>
    </div>    
    </div>
</body>
</html>