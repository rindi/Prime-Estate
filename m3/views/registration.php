<?php
include 'views/navbar.php';
require '../controllers/users_controller.php';
require '../models/user_model.php';

?>

<!-- register form -->
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
    <body>
      <br/>
      <form align="center" name="registration" action="confirmregistration.php" method="POST">
      <table style="text-align:center; margin: 0px auto">
      <tr>
        <td>Username</td>
        <td>
          <input type="text" name="login_username" required/>
        </td>
      </tr> 
      <tr>
        <td>Password</td>
        <td>
            <input type="password" name="login_password" required/>
        </td>
      </tr>
      <tr>
        <td>Confirm Password</td>
        <td>
            <input type="password" name="login_confirm_password" required/>
        </td>
      </tr>
      <tr>
        <td>Email</td>
        <td>
            <input type="text" name="login_email" required/>
        </td>
      </tr>
     </table>
       <br/>
        <input type="submit"  name="register" value="Register" />
    </form>
</body>
<a href="index.php">Back to Login Page</a>
</html>
  