<?php
setcookie('loggedIn', '', time()-(60*60*24*7), '/');
#    unset( $_COOKIE['loggedIn'] ); 		
header("location: /");
exit;			

