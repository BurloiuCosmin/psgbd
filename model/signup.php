<?php
require_once '../utilities/connection.php';
require_once '../utilities/db-functions.php';

// REGISTER USER
if (isset($_POST['register'])) {
	// initializing variables
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$username = $_POST['username'];
	$email    = $_POST['email'];
	$password = $_POST['password'];
	$phone_number = $_POST['phone_number'];
	$address = $_POST['address'];
	$errors = array();
	$data ='';

	// form validation: ensure that the form is correctly filled ...
	// by adding (array_push()) corresponding error unto $errors array
	if (empty($first_name)) { array_push($errors, "First name is required"); }
	if (empty($last_name)) { array_push($errors, "Last name is required"); }
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($password)) { array_push($errors, "Password is required"); }
	if (empty($phone_number)) { array_push($errors, "Phone number is required"); }
	if (empty($address)) { array_push($errors, "Address is required"); }

	if( ctype_alpha($first_name) == true &&
	    ctype_alpha($last_name) == true &&
	    ctype_space($username) == false &&
	    ctype_digit($phone_number) == true
	){
			$ok =1;
	}else{
		array_push($errors, "One information was badly written, please try again");
	}

	if ( null == filter_var( $email, FILTER_VALIDATE_EMAIL ) || false == filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
							array_push($errors, "Email is not properly written"); }
	// first check the database to make sure
	// a user does not already exist with the same username and/or email
	//parola ar trebui introdusa hashed
	$data = register($username, $password, $last_name, $first_name, $phone_number, $email, $address);

	if ( 0 == $data ) {
		array_push($errors, "The user already exists");
	}
	else {
		header( 'location: ../templates/login.php' );
		exit;
	}
}