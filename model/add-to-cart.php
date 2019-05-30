<?php
require_once '../utilities/connection.php';
require_once '../utilities/db-functions.php';

$game = $_GET['id'];
$conn = oci_connect('MARIUTA', 'MARIUTA', "//localhost:1521");


//pe baza lui faci query

