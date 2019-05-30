<?php

$id_client = $_COOKIE['id'];
$conn = oci_connect('MARIUTA', 'MARIUTA', "//localhost:1521");


$sql3 = 'SELECT id FROM comenzi WHERE ROWNUM = 1 ORDER BY id desc';
$stid3 = oci_parse($conn, $sql3);
oci_execute($stid3);
$row3 = oci_fetch_array($stid3, OCI_ASSOC);
$id_comanda = $row3['ID'];
//echo $id_comanda;


$sql = 'SELECT id_joc from comenzi_detalii where rownum = 1 and id_comanda = :id_comanda';
//$sql = 'SELECT id_joc from comenzi_detalii cd join comenzi c on cd.id_comanda=c.id where c.precomanda = 1 and rownum = 1';
$stid = oci_parse($conn, $sql);
oci_bind_by_name($stid, ':id_comanda', $id_comanda);
oci_execute($stid);
//oci_bind_by_name($stid, ':p_id_client', $id_client);
$row = oci_fetch_array($stid, OCI_ASSOC);
$id_game = $row['ID_JOC'];
//echo $id_game;

$sql4 = 'BEGIN :result := recomandari(:p_id_joc); end;';
$stid4= oci_parse($conn, $sql4);
oci_bind_by_name($stid4, ':p_id_joc', $id_game);
oci_bind_by_name($stid4, ':result', $result);
oci_execute($stid4);

//echo $result;


$sql5 = 'SELECT nume from jocuri where id = :id_jocc';
$stid5 = oci_parse($conn, $sql5);
oci_bind_by_name($stid5, ':id_jocc', $result);
oci_execute($stid5);
$row5 = oci_fetch_array($stid5, OCI_ASSOC);
$nume_joc = $row5['NUME'];
echo $nume_joc;


