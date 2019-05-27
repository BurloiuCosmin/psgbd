<?php
require_once '../utilities/connection.php';
//require_once '../utilities/randomgenerator.php';

session_start();

$errors = array();
$datas='';
$psgbd_reset_email='psgbd@psgbd.com';
$random_token=randomize();

// Create a token and send it to the user via email
if ( isset( $_POST['send'] ) ) {

	$email = $_POST['email'];
	$msg   = 'Because you had some issues with your password, PSGBD will come and rescue the situation.' . "\r\n" . "\r\n" . ' Click on the following link to reset your password: ' . ' http://psgbd.local/psgbd/templates/reset.php?token=' . $random_token . '&email=' . $email . ' .' . "\r\n" . "\r\n" . ' Have a jolly day!';
	$flag = 0;

	if ( empty( $email ) ) {
		array_push( $errors, "Email is required at re-setting the password" );
	}

	if ( null == filter_var( $email, FILTER_VALIDATE_EMAIL ) || false == filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
		array_push( $errors, "Email is not properly written" );
	}

	$datas = $database->select("users_db", [ "email" ]);
	foreach($datas as $data){
		if ($email==$data['email']) {
			$flag=1;
			break;
		}
	}

	if ( count( $errors ) == 0 && 1==$flag ) {
		$datas = $database->select( "users_db", [ "email" ] );
		foreach ( $datas as $data ) {
			if ( $email == $data['email'] ) {

				$database->update('users_db', [
					'token'=> $random_token
				],
					[ "email"=>$data['email']]);

				mail( $email, 'PSGBD gifted you something small, but important...', $msg, 'From: ' . $psgbd_reset_email );
				header( 'location: ../templates/afterforgot.php' );
				exit();
			}
		}
	}
	else{
		array_push($errors, "The user doesn't exist");
	}
}

