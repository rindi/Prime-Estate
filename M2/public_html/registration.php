<?php
require_once("Brain/dbconfig.php");
require_once("Brain/dbconnect.php");
?>
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Prime Estate</a>
        <ul class="nav navbar-nav">
         <li class="active">
             <a href="login.php">Sign in</a>
         </li>
         <li class="active">
             <a href="registration.php">Register</a>
         </li>
        </div>
        </nav>
  <h2 align="center">Register your account at Prime Estate</h2>
  <form align="center" name="registration" action="Brain/register.php" method="POST">
  <br/><table align="center" cellpadding="10">
      <tr>
          <td>Username  </td>
       <td><input type="text" name="username"/></td>
  </tr> <tr>
  <td>Password  </td>
  <td><input type="password" name="password"/></td>
    </tr> <tr>
  <td>Email </td>
  <td><input type="text" name="email"/></td>
    </tr> </table>
        <br/><button type="submit">Submit</button>
 </form>
  <footer>
        <div class="footer navbar-fixed-bottom">
        <a href="data_usage.php">Data usage</a>
    </footer>
</html>
  