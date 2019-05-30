<?php
require_once '../utilities/connection.php';
require_once '../utilities/db-functions.php';

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
while ( $row = oci_fetch_array( $stid, OCI_ASSOC + OCI_RETURN_NULLS ) && $i <11 ) {
	print "<tr>\n";
	foreach ( $row as $item ) {
		print "    <td>" . ( $item !== null ? htmlentities( $item, ENT_QUOTES ) : "&nbsp;" ) . "</td>\n";
		echo '<div class="container has-text-center"><a class="button is-primary is-rounded is-small" href="../model/add-to-cart.php?id=' . $item['id'] .'">Buy it</a></div>';
	}
	print "</tr>\n";
	$i++;
}
print "</table>\n";


oci_free_statement($stid);
oci_close($conn);





