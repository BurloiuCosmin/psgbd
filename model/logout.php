<?php

if(isset($_POST['logout'])) {
	setcookie( "username", '', time() - 1, '/' );
	setcookie( "password", '', time() - 1, '/' );
	setcookie( "id", '', time() - 1, '/' );

	header( 'location: ../templates/login.php' );
	die;
}