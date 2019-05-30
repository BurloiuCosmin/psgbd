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

			$conn = oci_connect('MARIUTA', 'MARIUTA', "//localhost:1521");
			$sql = 'SELECT id from clienti where username = :username and parola = :parola';
			$stid = oci_parse($conn, $sql);
			oci_bind_by_name($stid, ':username', $username);
			oci_bind_by_name($stid, ':parola', $password);
			if (!$stid) {
				$e = oci_error($conn);
				trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
			}
			$r = oci_execute($stid);
			if (!$r) {
				$e = oci_error($stid);
				trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
			}
			$row = oci_fetch_array($stid, OCI_ASSOC);
			$id = $row['ID'];
			setcookie( 'id', $id, time() + 3600, '/' );
			header( 'location: ../templates/categories.php' );
			die;

		} else {
			$errors[] = "There is no user that has the username and password you have wrote. Please try again.";
		}
	}
}

