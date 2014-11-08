<?php

?>
<html>
    <head>
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
        border: solid #000000 2px; 
        z-index: 9; 
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <body>
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header"  >
            <a class="navbar-brand" href="http://sfsuswe.com/~f14g03/index.php">Prime Estate</a>
            <ul class="nav navbar-nav">
            <li class="active">
                <div id="popupbox"> 
                <form method="post" action="profile.php" name="loginform">
                <label for="login_username">Username</label>
                <input id="login_username" type="text" name="login_username" placeholder="Username" required />
                <label for="login_password">Password</label>
                <input id="login_password" type="password" name="login_password" placeholder="Password"required />
                <input type="submit"  name="login" value="Log in" />
                </form>
                Not a member? <a href="http://sfsuswe.com/~f14g03/views/registration.php"> Click here to register!</a>
                <center><a href="javascript:login('hide');">Close</a></center> 
                </div> 
            </li>
            <li class="active"> 
                <a href="http://sfsuswe.com/~f14g03/views/sell.php">Sell Your Home Today!</a>
             </li>
             <li class="active">
                <a href="http://sfsuswe.com/~f14g03/views/leads.php">Leads</a>
            </li>
            <li class="active">
                <a href="http://sfsuswe.com/~f14g03/views/registration.php">Register</a>
            </li>
            <li class="active">
                <a href="http://sfsuswe.com/~f14g03/views/profile.php">Signed in</a>
            </li>
            <li class="active"> 
                <a href="http://sfsuswe.com/~f14g03/views/logout.php">Logout</a>
             </li>
            </div>
        </nav>
        <footer>
        <div class="footer navbar-fixed-bottom">
        <a href="data_usage.php">Data usage</a>
        </footer>
    </body>
</html>