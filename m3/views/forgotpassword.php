<?php
require_once ("../controllers/users_controller.php");
include("navbar.php");
/**
 * Description of forgotpassword
 *
 * @author rushabindi
 */
if(!isset($_POST['login_username']))
{$username = $_POST['login_username'];}
$usercontroller = new users_controller();
$userquestion = $usercontroller->getUserQuestion($username);

if (isset($_POST['SubmitButton'])) {
    $answer = $_POST['answer'];
    $reganswer = $usercontroller->getUserNameInfo($username['answer']);
    echo $reganswer;
    
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
        <span>
            <h2>
                Question : <?php echo $userquestion;?>
            </h2>
        </span>
        <input type="text" class="form-control input-lg" name="answer" placeholder="Your answer" required>
    </div>

    <div class="form-group" align="center" style="margin-bottom: 10px">
        <input type="submit" name = "SubmitButton" class="btn btn-default" value="Verify answer" align="center">
    </div>
    </form>
    </div>
    </div>    
    </div>
</body>
</html>