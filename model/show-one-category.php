<?php
require_once '../utilities/connection.php';
require_once '../utilities/db-functions.php';

$i                  = 1;
$ok                 = 0;
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
		break;
	}
}

if ( $ok == 0 ) {
	header( 'location: ../templates/categories.php' );
}

//$games = filtrareDupaCategorii( $requested_category );
$conn = oci_connect( 'MARIUTA', 'MARIUTA', "//localhost:1521" );
$sql  = 'SELECT * FROM jocuri';
$stid = oci_parse( $conn, $sql );
if ( ! $stid ) {
	$e = oci_error( $conn );
	trigger_error( htmlentities( $e['message'], ENT_QUOTES ), E_USER_ERROR );
}
$r = oci_execute( $stid );
if ( ! $r ) {
	$e = oci_error( $stid );
	trigger_error( htmlentities( $e['message'], ENT_QUOTES ), E_USER_ERROR );
}
print "<table border='1'>\n";

while ( $row = oci_fetch_array( $stid, OCI_ASSOC) ) {
	print "<tr>\n";
	foreach ( $row as $item ) {
		print "    <td>" . ( $item !== null ? htmlentities( $item, ENT_QUOTES ) : "&nbsp;" ) . "</td>\n";
		echo '<div class="container has-text-center"><a class="button is-primary is-rounded is-small" href="../model/add-to-cart.php?id=' . $item['id'] .'">Buy it</a></div>';

	}
	print "</tr>\n";
}
print "</table>\n";



oci_free_statement($stid);
oci_close($conn);



