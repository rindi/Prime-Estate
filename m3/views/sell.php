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
                var sPhone = $('#phone').val();
                if ($.trim(sPhone).length == 0) {
        alert('Please enter valid phone number');
                e.preventDefault();
        }
        if ($.trim(sEmail).length == 0) {
        alert('Please enter valid email address');
                e.preventDefault();
        }
        if (validatePhone(sPhone)) {
        1 = 1;
        }
        else {
        alert('Invalid Phone Number');
                e.preventDefault();
        }
        if (validateEmail(sEmail)) {
        1 = 1;
        }
        else {
        alert('Invalid Email Address');
                e.preventDefault();
        }
        });
        });
                function validatePhone(phone) {
                var filter = /^\d{10}/;
                        if (filter.test(phone)) {
                return true;
                }
                else {
                return false;
                }
                }
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
            <div class="container-fluid">
                <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sell your home with PrimeEstate</h3>
                        </div>
                        <div class="panel-body">

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
                                        <input type="text" name="phone"  id="phone" maxlength="10" required/>
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

                        </div>
                    </div> 
                </div>  
        </form>
    </body>
</html>
