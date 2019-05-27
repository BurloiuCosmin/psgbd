<?php

if(isset($_POST['logout'])) {
	setcookie( "first_name", '', time() - 1, '/' );
	setcookie( "email", '', time() - 1, '/' );
	setcookie( "password", '', time() - 1, '/' );
	setcookie( "user_id", '', time() - 1, '/' );

	header( 'location: http://pixy.local/ssh/view/login.php' );
	die;
}