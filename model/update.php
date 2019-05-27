<?php
require_once '../utilities/connection.php';

// MODIFY PERSON'S DETAILS
if (isset($_POST['save'])) {

	// initializing variables
	$person_id = $_GET['id'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email    = $_POST['email'];
	$preferences = $_POST['preferences'];
	$private_notes= $_POST['private_notes'];
	$errors = array();
	$datas ='';
	$i=0;

	// form validation: ensure that the form is correctly filled ...
	// by adding (array_push()) corresponding error unto $errors array
	if (empty($first_name)) { array_push($errors, "First name is required"); }
	if (empty($last_name)) { array_push($errors, "Last name is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if ( null == filter_var( $email, FILTER_VALIDATE_EMAIL ) || false == filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
		array_push($errors, "Email is not properly written"); }


	// Check if
	// a user does not already exist with the same email
	$datas = $database->select("persons_db", [ "email", "person_id", "first_name","last_name","preferences","private_notes",]);
	foreach($datas as $data) {
		if ( $email == $data['email'] && $person_id != $data['person_id']) {
				$i = $i + 1; //retinem cate emailuri mai sunt asa
		}
	}

	if($i>0){
		array_push($errors, "You cannot modify the email with an email of an already existent user from your list");
	}


	// Finally, update if there are no errors in the form
	if (count($errors) == 0) {

		$database->update('persons_db', [
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email' => $email,
			'preferences' => $preferences,
			'private_notes' => $private_notes,
		],[ "person_id[=]"=>$person_id]);


		header('location: ../view/persons.php');
		exit;
	}
}