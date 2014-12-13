<?php
require_once ("../controllers/users_controller.php");
include("navbar.php");
/**
 * Description of forgotpassword
 *
 * @author rushabindi
 */
$username = $_POST['username'];
$answer = $_POST['answer'];

$temppass = base64_encode($username);
echo $temppass;
$temppassdb = md5($temppass);
$usercontroller = new users_controller();
$userquestion = $usercontroller->getUserQuestion($username);
$reganswer = $usercontroller->getUserAnswer($username);
$input['username'] = $username;
$input['password'] = $temppassdb;
        
if($answer==$reganswer)
{
    $usercontroller->changePassword($input);
    echo "Password changed";
}

?>
<html>
<body>
    <div class="container-fluid">
    <div id="box" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" >
    <div class="panel-heading" style="border: 1px solid;border-color: 000;">
        <h3 class="panel-title" style="color: fff;"></h3>
    </div>
    <div class="panel-body" style="border: 1px solid;border-color:#12ACA5;">

    </form>
    </div>
    </div>    
    </div>
</body>
</html>