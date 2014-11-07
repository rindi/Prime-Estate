<!DOCTYPE html>

<?php
include 'navbar.php';

?>
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <title></title>
        <script>
        $(document).ready(function() {
    $(".button").click(function(e) {
        $("body").append(''); $(".popup").show(); 
        $(".close").click(function(e) { 
            $(".popup, .overlay").hide(); 
        }); 
    }); 
});$</script>
    </head>
    <body>
        <style>
        .button {
	display: inline-block;
	background: #000;
	padding: 5px 10px;
	z-index: 0;
	color: #fff;
}
 
.overlay {
	z-index: 5;
	background: rgba(0, 0, 0, .50);
	display: block;
	position: fixed;
	width: 100%;
	height: 100%;
}
 
.popup {
	padding: 10px 10px 35px;
	background: #fff;
	z-index: 999;
	display: none;
	position: absolute;
	right: 0;
}
        </style>
        
        <div class="ar login_popup">
        <a class="button" href="#" >Login</a>        
        <div class="popup">
            <a href="#" class="close">CLOSE</a>
            <form method="post" action="index.php" name="loginform">
                <label for="login_username">Username</label>
                <input id="login_username" type="text" name="login_username" placeholder="Username" required />
                <label for="login_password">Password</label>
                <input id="login_password" type="password" name="login_password" placeholder="Password"required />
                <input type="submit"  name="login" value="Log in" />
            </form>
        </div>
        </div>
        <a href="registration.php">Register new account</a>
    </body>
</html>
