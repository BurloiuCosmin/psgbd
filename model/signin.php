<?php
require_once '../utilities/connection.php';
require_once '../utilities/db-functions.php';


// LOGIN USER
if ( isset( $_POST['login'] ) ) {

	$username    = $_POST['username'];
	$password = $_POST['password'];
	$errors   = array();
	$data     = array();

	if ( empty( $username ) ) {
		$errors[] = "Username is required at login";
	}
	if ( empty( $password ) ) {
		$errors[] = "Password is required at login";
	}

	if ( count( $errors ) == 0 ) {

		$data = login($username, $password);

		if ( 1 === $data ) {
//			if ( true == password_verify($password,$data[0]['password']) ) {
//			$data = $data[0];
			setcookie( 'username', $username, time() + 3600, '/' );
//			setcookie( 'user_id', $data['user_id'], time() + 3600, '/' );
//			setcookie( 'email', $data['email'], time() + 3600, '/' );
			setcookie( 'password', $password, time() + 3600, '/' );

//			header( 'location: http://localhost:1234/psgbd/templates/orders-history.php' );
			header( 'location: ../templates/orders-history.php' );
			die;

		} else {
			$errors[] = "There is no user that has the username and password you have wrote. Please try again.";
		}
	}
}

