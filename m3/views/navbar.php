<?php
session_start();
if(isset($_SESSION['type']))
    $type = $_SESSION['type'];
else
    $type = 0;
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
            <?php if($type==0)
            {?>
                <li class="active">
                <a href="http://sfsuswe.com/~f14g03/views/login.php">Login</a>
            </li><?php
            }
            if($type==0||$type==1)
            {?>
            <li class="active"> 
                <a href="http://sfsuswe.com/~f14g03/views/sell.php">Sell Your Home Today!</a>
             </li><?php
            }
            if($type==2)
            {?>
             <li class="active">
                <a href="http://sfsuswe.com/~f14g03/views/leads.php">Leads</a>
            </li><?php
            }
            if($type==0)
            {?>
            <li class="active">
                <a href="http://sfsuswe.com/~f14g03/views/registration.php">Register</a>
            </li><?php
            }
            if($type==1)
            {?>
            <li class="active">
                <a href="http://sfsuswe.com/~f14g03/views/profile.php">Customer</a>
            </li><?php
            }
            if($type==2)
            {?>
            <li class="active">
                <a href="http://sfsuswe.com/~f14g03/views/dashboard.php">Realtor</a>
            </li><?php
            }
            if($type==3)
            {?>
            <li class="active">
                <a href="http://sfsuswe.com/~f14g03/views/admin.php">Admin</a>
            </li><?php
            }
            if($type==1||$type==2||$type==3)
            {?>
            <li class="active"> 
                <a href="http://sfsuswe.com/~f14g03/views/logout.php">Logout</a>
            </li><?php } ?>
            </div>
        </nav>
        <footer>
        <div class="footer navbar-fixed-bottom">
        <a href="data_usage.php">Data usage</a>
        </footer>
    </body>
</html>