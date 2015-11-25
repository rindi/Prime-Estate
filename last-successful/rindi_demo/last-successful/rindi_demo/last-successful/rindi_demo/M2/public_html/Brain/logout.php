<?php
    setcookie("username", "null", time()-10000, "/");
    header("Location: ../");
?>