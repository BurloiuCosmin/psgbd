<?php

require_once '../utilities/connection.php';
require_once '../utilities/randomgenerator.php';

session_start();


//Change the old password with a new one
if ( isset( $_POST['set'] ) ) {

	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$errors    = array();
	$datas     = '';
	$email     = $_GET['email'];
	$token     = $_GET['token'];

	if ( empty( $password1 ) ) {
		array_push( $errors, "First password is not set" );
	}

	if ( empty( $password2 ) ) {
		array_push( $errors, "Second password is not set" );
	}

	if ( $password1 != $password2 ) {
		array_push( $errors, "Passwords do not match" );
	}

	if ( count( $errors ) == 0 ) {
		$datas = $database->select( "users_db", [ "email", "password", "token" ] );
		foreach ( $datas as $data ) {
			if ( $email == $data['email'] && $token==$data['token'] ) {
				$database->update( "users_db", [
					"password" => password_hash($password1,PASSWORD_DEFAULT),
					"token" => rand(96578,456780)
				], [
					"email" => $email
				] );

				header( 'location: ../view/login.php' );
				exit;
			}
		}
	}
}

