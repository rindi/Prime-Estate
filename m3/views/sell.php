<?php
include 'navbar.php';
#include 'views/navbar.php';
#require '../controllers/users_controller.php';
#require '../models/user_model.php';

?>

<!-- register form -->
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
    <body>
      <br/>
      <form align="center" name="sell" action="sellsubmitted.php" method="POST">
      <table style="text-align:center; margin: 0px auto">
      <tr>
        <td>First Name*</td>
        <td>
          <input type="text" name="firstname" required/>
        </td>
      </tr> 
      <tr>
        <td>Last Name*</td>
        <td>
            <input type="text" name="lastname" required/>
        </td>
      </tr>
      <tr>
        <td>Phone Number*</td>
        <td>
            <input type="text" name="phone" class="form-control bfh-phone" data-format="+1 (ddd) ddd-dddd" required/>
        </td>
      </tr>
      <tr>
        <td>Email*</td>
        <td>
            <input type="text" name="email" required/>
        </td>
      </tr>
     </table>
       <br/>
     <input type="submit" value="Submit">   
      </form>
</body>
</html>
  