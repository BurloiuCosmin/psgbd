<?php
require_once '../utilities/connection.php';
require_once '../utilities/db-functions.php';

$ok = 0;
$requested_category = $_GET['category'];
$categories         = array(
	'actiune'   => 'action',
	'aventura'  => 'adventure',
	'lupte'     => 'fighting',
	'puzzle'    => 'puzzle',
	'curse'     => 'racing',
	'RPG'       => 'RPG',
	'sport'     => 'sports',
	'strategie' => 'RTS',
	'FPS'       => 'FPS',
	'TPS'       => 'TPS'
);

foreach ( $categories as $key => $category ) {

	if ( $requested_category == $category ) {

		$ok                 = 1;
		$requested_category = $key;
		$games              = filtrareDupaCategorii( $requested_category );
	}
}


if( $ok == 0 ){
	header( 'location: ../templates/categories.php' );
}
