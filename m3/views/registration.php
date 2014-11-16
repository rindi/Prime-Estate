<?php
include 'navbar.php';
#require '../controllers/users_controller.php';
#require '../models/user_model.php';
if (1 == count($_GET))
    $type = $_GET['type'];
else
    $type = null;
?>

<!-- register form -->
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
    <body>
        <br/>
        <?php
        if ($type == 2)
            echo "<form align='center' name='registration' action='confirmregistration.php?type=2' method='POST'>";
        else
            echo "<form align='center' name='registration' action='confirmregistration.php' method='POST'>";
        ?>
        <div class="container-fluid">
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registration</h3>
                    </div>
                    <div class="panel-body">
                        <table style="text-align:center; margin: 0px auto">
                            <tr>

                                <td>Username*</td>
                                <td>
                                    <input type="text" name="login_username" required/>
                                </td>
                            </tr> 
                            <tr>
                                <td>Password*</td>
                                <td>
                                    <input type="password" name="login_password" id="login_password" required/>
                                </td>
                            </tr>
                            <tr>
                                <td>Confirm Password*</td>
                                <td>
                                    <input type="password" name="login_confirm_password" id="login_confirm_password" required/>
                                </td>
                            </tr>
                            <tr>
                                <td>Email*</td>
                                <td>
                                    <input type="text" name="login_email" id="email" placeholder="me@example.com" required/>
                                </td>
                            </tr>
                            <tr>
                                <td>First Name</td>
                                <td>
                                    <input type="text" name="first_name"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td>
                                    <input type="text" name="last_name"/>
                                </td>
                            </tr>
                                                        <tr>
                                <td></td>
                              
                            </tr>
                        </table>

                        <input type="submit" value="Register">
                    </div>
                </div>
            </div> 
        </div>  
        <br/>
        <script type="text/javascript">
            window.onload = function ()
                    document.forms[0].addEventListener('submit', function (evt)
            {
                var firstpassword = document.getElementById('login_username');
                var confirmpassword = document.getElementById('login_username');
                alert(firstpassword);
                alert(confirmpassword);
                if (firstpassword != confirmpassword)
                {
                    window.alert("Passwords do not match.");
                    evt.preventDefault();
                }
        }, false)
        ;
        </script>    
    </form>
</body>

</html>
