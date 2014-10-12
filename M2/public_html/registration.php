<?php
require_once("Brain/dbconfig.php");
require_once("Brain/dbconnect.php");
?>
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <nav class="navbar navbar-default" role="navigation">
        <a class="navbar-index" href="index.php">Home</a>
        <a href="login.php">Sign in</a>
    </nav>
  <h1 align="center">Register your account at Prime Estate</h1>
  <form align="center" name="registration" action="Brain/register.php" method="POST">
  <table align="center">
      <tr>
          <td><label for 'username'>Username: </label></td>
       <td><input type="text" name="username"/></td>
  </tr> <tr>
  <td><label for 'password'>Password: </label></td>
  <td><input type="password" name="password"/></td>
    </tr> <tr>
  <td><label for 'email'>Email: </label></td>
  <td><input type="text" name="email"/></td>
    </tr> </table>
        <br/><button type="submit">Submit</button>
 </form>
</html>
  