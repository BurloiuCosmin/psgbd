<?php

function login($username, $password) {
	$sql = 'BEGIN :result := login(:p_username, :p_parola); END;';
	$stid = oci_parse($conn, $sql);
	oci_bind_by_name($stid, ':p_username', $username);
	oci_bind_by_name($stid, ':p_parola', $password);
	oci_bind_by_name($tid, ':result', $result);
	return $result;
}


function register($username, $password, $lastname, $firstname, $phone, $email, $adress) {
	$sql = 'BEGIN register(:p_username, :p_parola, :p_nume, :p_prenume, :p_telefon, :p_email, :p_adresa); END;';
	$stid = oci_parse($conn, $sql);
	oci_bind_by_name($stid, ':p_username', $username);
	oci_bind_by_name($stid, ':p_parola', $password);
	oci_bind_by_name($stid, ':p_nume', $lastname);
	oci_bind_by_name($stid, ':p_prenume', $firstname);
	oci_bind_by_name($stid, ':p_telefon', $phone);
	oci_bind_by_name($stid, ':p_email', $email);
	oci_bind_by_name($stid, ':p_adresa', $adress);
}