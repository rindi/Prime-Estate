<html>
    <body>
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Prime Estate</a>
            <ul class="nav navbar-nav">
            <!--?php if(!$loggedin): ?>-->
             <li class="active">
                 <a href="login.php">Sign in</a>
             </li>
             <li class="active">
                 <a href="registration.php">Register</a>
             </li>
            <!--?php else:?>-->
                <li class="active">
                    <a href="profile.php">Signed in as <?php echo $loggedinas;?></a>
                </li>
             <li class="active">
                 <a href="Brain/logout.php">Logout</a>
             </li>
             <!--?php endif; ?>-->
            </div>
        </nav>
    </body>
</html>