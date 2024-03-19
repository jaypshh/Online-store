<?php

    session_start();

    $helper = array_keys($_SESSION);
    foreach ($helper as $key) {
    	unset($_SESSION[$key]);
    	# code...
    }
    
if (empty($_SESSION)) {
echo "<script>window.open('login.php?logged_out=You have logged out, come back soon!','_self')</script>";

}

?> 