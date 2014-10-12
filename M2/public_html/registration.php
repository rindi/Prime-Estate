<?php
require_once("Brain/dbconfig.php");
require_once("Brain/dbconnect.php");
?>
<html>
    <a href="index.php"> Home </a>
    <p>
        Hi
    </p>
    <form name="registration" action="Brain/register.php" method="POST">
  <label for 'username'>Username: </label>
  <input type="text" name="username"/>
  <br/>
  <label for 'password'>Password: </label>
  <input type="password" name="password"/>
  <br/>
  <label for 'email'>Email: </label>
  <input type="text" name="email"/>
  <br/>
  <button type="submit">Submit</button>
 </form>
</html>
  