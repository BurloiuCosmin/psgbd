<?php
require_once '../utilities/connection.php';
require_once '../utilities/db-functions.php';
$ok = 0;
$requested_category = $_GET['category'];
$categories         = array('action', 'adventure', 'fighting', 'puzzle', 'racing', 'RPG', 'sports', 'RTS', 'FPS', 'TPS');
foreach ($categories as $category) {
	if ($requested_category == $category) {
		$ok                 = 1;
		$requested_category = $category;
		//$games = filtrareDupaCategorii( $requested_category );
		$conn = oci_connect('MARIUTA', 'MARIUTA', "//localhost:1521");
		$sql = 'SELECT id, nume, pret, disponibilitate, stoc, versiune, an_lansare, tematica, producator FROM jocuri where tematica = :categorie';
		$stid = oci_parse($conn, $sql);
		oci_bind_by_name($stid, ':categorie', $requested_category);
		if (!$stid) {
			$e = oci_error($conn);
			trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}
		$r = oci_execute($stid);
		if (!$r) {
			$e = oci_error($stid);
			trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}
		print "<table border='1'>\n";
		while ($row = oci_fetch_array($stid, OCI_ASSOC)) {
			print "<tr>\n";
			foreach ($row as $item) {
				print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
				
			}
			echo '<div class="container has-text-center"><a class="button is-primary is-rounded is-small" href="../model/add-to-cart.php?id=' . $row['ID'] .'">Buy it</a></div>';
			print "</tr>\n";
		}
		print "</table>\n";
	}
}
// if ($ok == 0) {
// 	header('location: ../templates/categories.php');