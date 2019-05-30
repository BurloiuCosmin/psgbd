<?php
require_once '../utilities/connection.php';
require_once '../utilities/db-functions.php';

$id_game = $_GET['id'];
echo $id_game;
$id_client = $_COOKIE['id'];
echo $id_client;
$conn = oci_connect('MARIUTA', 'MARIUTA', "//localhost:1521");
$sql4 = 'begin adaugareInCos(:p_id_client, :p_id_joc); end;';
$stid4= oci_parse($conn, $sql4);
oci_bind_by_name($stid4, ':p_id_client', $id_client);
oci_bind_by_name($stid4, ':p_id_joc', $id_game);
oci_execute($stid4);

?>

