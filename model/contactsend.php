<?php
require_once '../utilities/connection.php';

// SEND FORM
if ( isset( $_POST['sendContact'] ) ) {


	if ( empty( $email ) ) {
		array_push( $errors, "Email is required at login" );
	}
	if ( empty( $password ) ) {
		array_push( $errors, "Password is required at login" );
	}

	if ( count( $errors ) == 0 ) {
		header( 'location: ../view/login.php' );
	}
}

