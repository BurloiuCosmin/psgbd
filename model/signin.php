<?php
require_once '../utilities/connection.php';
require_once '../utilities/db-functions.php';


// LOGIN USER
if ( isset( $_POST['login'] ) ) {

	$username    = $_POST['username'];
	$password = $_POST['password'];
	$errors   = array();

	if ( empty( $username ) ) {
		$errors[] = "Username is required at login";
	}
	if ( empty( $password ) ) {
		$errors[] = "Password is required at login";
	}

	if ( count( $errors ) == 0 ) {

		$data = login($username, $password);

		if ( 1 == $data ) {
			setcookie( 'username', $username, time() + 3600, '/' );
			setcookie( 'password', $password, time() + 3600, '/' );

			header( 'location: ../templates/categories.php' );
			die;

		} else {
			$errors[] = "There is no user that has the username and password you have wrote. Please try again.";
		}
	}
}

