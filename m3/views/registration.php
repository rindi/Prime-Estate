<?php
#include 'views/navbar.php';
#require '../controllers/users_controller.php';
#require '../models/user_model.php';
if (1 == count($_GET))
    $type=$_GET['type'];
else
    $type=null;
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
            <input type="text" name="login_email" required/>
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
     </table>
       <br/>
     <input type="submit" value="Register">
      <script type="text/javascript">
            window.onload = function() 
            document.forms[0].addEventListener('submit', function( evt ) 
            {
                var firstpassword = document.getElementById('login_username');
                var confirmpassword = document.getElementById('login_username');
                alert(firstpassword);
                alert(confirmpassword);
                if(firstpassword!=confirmpassword)
                {
                    window.alert("Passwords do not match.");
                    evt.preventDefault();
                }
            }, false);
       </script>    
      </form>
</body>
<a href="index.php">Back to Login Page</a>
</html>
  