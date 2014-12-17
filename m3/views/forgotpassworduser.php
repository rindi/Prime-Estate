<?php
require_once ("../controllers/users_controller.php");
include("navbar.php");
/**
 * Description of forgotpassword
 *
 * @author rushabindi
 */

if(isset($_POST['login_username']))
$username = $_POST['login_username'];
$temppass = base64_encode($username);
$temppassdb = md5($temppass);
$usercontroller = new users_controller();
$userquestion = $usercontroller->getUserQuestion($username);
$reganswer = $usercontroller->getUserAnswer($username);

if (isset($_POST['SubmitButton'])) {
    $answer = $_POST['answer'];
    if($answer==$reganswer)
    {
        $usercontroller->changePassword($input);
    }
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
        <form action="forgotpassword.php" method="post">
    <div class="form-group">
        <span><h2>Username : </h2><input type="text" class="form-control input-lg" name="username" required></span>
    </div>
    <div class="form-group" align="center" style="margin-bottom: 10px">
        <input type="submit" name = "SubmitButton" class="btn btn-default" value="Enter username" align="center">
    </div>
    </form>
    </div>
    </div>    
    </div>
</body>
</html>