<?php
require_once '../utilities/connection.php';

$id_client = $_COOKIE['id'];

$conn = oci_connect('MARIUTA', 'MARIUTA', "//localhost:1521");
$sql = 'select id from comenzi where precomanda = 1 and id_client = :p_id_client';
$stid = oci_parse($conn, $sql);
oci_bind_by_name($stid, ':p_id_client', $id_client);
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
$id_comanda = $row['ID'];


$sql2 = 'SELECT id_joc from comenzi_detalii where id_comanda = :p_id_comanda';
$stid2 = oci_parse($conn, $sql2);
oci_bind_by_name($stid2, ':p_id_comanda', $id_comanda);
if (!$stid2) {
    $e = oci_error($conn);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
$r2 = oci_execute($stid2);
if (!$r2) {
    $e = oci_error($stid2);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
print "<table border='1'>\n";
while($row2 = oci_fetch_array($stid2, OCI_ASSOC)) {
    print "<tr>\n";
    
    foreach ($row2 as $item2) {
        print "    <td>" . ($item2 !== null ? htmlentities($item2, ENT_QUOTES) : "&nbsp;") . "</td>\n";
}
	echo '<div class="container has-text-center"><a class="button is-primary is-rounded is-small" href="../model/delete-from-cart.php?id=' . $row['ID'] .'">Remove it</a></div>';

}
print "</table>\n";


$sql7 = 'begin vanzariFidelitate(:p_id_client); end;';
$stid7= oci_parse($conn, $sql7);
oci_bind_by_name($stid7, ':p_id_client', $id_client);
oci_execute($stid7);

$sql8 = 'select fidelitate from statistici where id_client = :idd_client';
$stid8 = oci_parse($conn, $sql8);
oci_bind_by_name($stid8, ':idd_client', $id_client);
$r8 = oci_execute($stid8);
$row8 = oci_fetch_array($stid8, OCI_ASSOC);
$fidelitate = $row8['FIDELITATE'];
if( $fidelitate == 2){
echo "Punctele mele de fidelitate sunt: " . $fidelitate . " si am reducere 30%";
}
else 
echo "Punctele mele de fidelitate sunt: " . $fidelitate;











