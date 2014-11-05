<?php
include 'views/navbar.php';

if (isset($registration)) {
    if ($registration->errors) {
            echo $error;
        }
    if ($registration->messages) {
            echo $message;
        }
    }
?>

<!-- register form -->
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
    <body>
      <br/>
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
            <input type="text" name="email" required/>
        </td>
      </tr>
     </table>
       <br/>
        <input type="submit"  name="register" value="Register" />
    </form>
</body>
</html>
<a href="index.php">Back to Login Page</a>
</html>
  