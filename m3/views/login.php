<!DOCTYPE html>

<?php
include 'navbar.php';

?>

<html>
<head>
<title></title>
<style type="text/css">
#popupbox{
margin: 0; 
margin-left: 40%; 
margin-right: 40%;
margin-top: 50px; 
padding-top: 10px; 
width: 20%; 
height: 150px; 
position: absolute; 
background: #FBFBF0; 
border: solid #000000 2px; 
z-index: 9; 
font-family: arial; 
visibility: hidden; 
}
</style>
<script language="JavaScript" type="text/javascript">
function login(showhide){
if(showhide == "show"){
    document.getElementById('popupbox').style.visibility="visible";
}else if(showhide == "hide"){
    document.getElementById('popupbox').style.visibility="hidden"; 
}
}
</script>
</head>
<body>

<div id="popupbox"> 
<form method="post" action="profile.php" name="loginform">
                <label for="login_username">Username</label>
                <input id="login_username" type="text" name="login_username" placeholder="Username" required />
                <label for="login_password">Password</label>
                <input id="login_password" type="password" name="login_password" placeholder="Password"required />
                <input type="submit"  name="login" value="Log in" />
            </form>
<br />
Not a member? <a href="http://sfsuswe.com/~f14g03/views/registration.php"> Click here to register!</a>
<center><a href="javascript:login('hide');">Close</a></center> 
</div> 
<p><a href="javascript:login('show');">Login</a></p>
</body>
</html>
            