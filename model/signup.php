<?php

require_once '../utilities/connection.php';


// REGISTER USER
if (isset($_POST['register'])) {

	// initializing variables
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email    = $_POST['email'];
	$password = $_POST['password'];
	$hashed_password = password_hash($password,PASSWORD_DEFAULT);
	$errors = array();
	$datas ='';

	// form validation: ensure that the form is correctly filled ...
	// by adding (array_push()) corresponding error unto $errors array
	if (empty($first_name)) { array_push($errors, "First name is required"); }
	if (empty($last_name)) { array_push($errors, "Last name is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($password)) { array_push($errors, "Password is required"); }
	if ( null == filter_var( $email, FILTER_VALIDATE_EMAIL ) || false == filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
							array_push($errors, "Email is not properly written"); }

		// first check the database to make sure
		// a user does not already exist with the same username and/or email
		$datas = $database->select("users_db", [ "email" ]);
		foreach($datas as $data){
			if ($email==$data['email']) {
			array_push($errors, "The user already exists");
			}
		}


	// Finally, register user if there are no errors in the form
	if (count($errors) == 0) {

		$database->insert('users_db', [
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email' => $email,
			'password' => password_hash($password,PASSWORD_DEFAULT),
		]);


		header('location: ../view/login.php');
		exit;
	}
}