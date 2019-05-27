<?php
require_once '../utilities/connection.php';

if(!empty($_GET['id'])){
	$person_id = $_GET['id'];
	$desired_user = $database->select( "persons_db", '*', [ 'person_id' => $person_id ] );
	$desired_user = $desired_user[0];
	include '../view/edit.php';
}