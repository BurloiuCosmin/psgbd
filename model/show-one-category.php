<?php
require_once '../utilities/connection.php';
require_once '../utilities/db-functions.php';

$requested_category = $_GET['category'];
$categories = array('action', 'adventure', 'fighting', 'puzzle', 'racing', 'RPG', 'sports', 'RTS', 'FPS', 'TPS');

if( in_array( $requested_category, $categories ) ){
	$games = filtrareDupaCategorii( $requested_category );
}
else {
	header( 'location: ../templates/categories.php' );
}
