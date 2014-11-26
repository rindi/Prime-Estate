<?php
require_once ("../controllers/users_controller.php");
include("navbar.php");

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

    
    $input['username'] = $_SESSION['username'];
    $input['password'] = $_POST['newPassword'];
//    $input['bathrooms'] = $_POST['bathrooms'];
//    $input['description'] = $_POST['description'];
//    $input['userid'] = $_SESSION['userid'];
    
    
    $usercontroller = new users_controller();
    $encryptedpassword = md5($currentPassword);
    $userlist = $usercontroller->getUsers();
    if($newPassword==$confirmPassword)
    {
        foreach ($userlist as $row) 
        {
            if( $row->getUserName() == $username && $row->getUserPassword() == $encryptedpassword )
            {
                $row->changePassword($input);
            }
        }
    }
    else
        echo "Current Password is incorrect or Passwords did not match";
    }
?>

<form>
<div class="form-group">
    <input type="password" class="form-control input-lg" name="currentPassword" placeholder="Current Password" required>
</div>

<div class="form-group">
    <input type="password" class="form-control input-lg" name="newPassword" placeholder="New Password" required>
</div>

<div class="form-group">
    <input type="password" class="form-control input-lg" name="confirmPassword" placeholder="Confirm New Password" required>
</div>

<div class="form-group" style="margin-bottom: 10px">
    <button class="btn btn-default btn-lg btn-block" type="submit" name = "SubmitButton" ><strong>Change Password</strong></button>
</div>
</form>

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