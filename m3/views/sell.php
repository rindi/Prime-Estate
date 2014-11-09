<?php
include 'navbar.php';
#include 'views/navbar.php';
#require '../controllers/users_controller.php';
#require '../models/user_model.php';

?>

<html>
    <script>
        $(document).ready(function(e) {
            $('#submitlead').click(function() {
                var sEmail = $('#email').val();
                if ($.trim(sEmail).length == 0) {
                    alert('Please enter valid email address');
                    e.preventDefault();
                }
                if (validateEmail(sEmail)) {
                   1=1;
                }
                else {
                    alert('Invalid Email Address');
                    e.preventDefault();
                }
            });
        });

        function validateEmail(sEmail) {
            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            if (filter.test(sEmail)) {
                return true;
            }
            else {
                return false;
            }
        } 
    </script>
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
            <input type="text" name="phone" required/>
        </td>
      </tr>
      <tr>
        <td>Email*</td>
        <td>
            <input type="email" name="email" id="email" placeholder="me@example.com" required/>
        </td>
      </tr>
     </table>
       <br/>
     <input type="submit" value="Submit" id="submitlead">   
      </form>
</body>
</html>
  