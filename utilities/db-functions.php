<?php

function login($username, $password) {
	$conn = oci_connect('MARIUTA', 'MARIUTA', "//localhost:1521");
	$sql = 'BEGIN :result := login(:p_username, :p_parola); END;';
	$stid = oci_parse($conn, $sql);
	oci_bind_by_name($stid, ':result', $result);
	oci_bind_by_name($stid, ':p_username', $username);
	oci_bind_by_name($stid, ':p_parola', $password);
	oci_execute($stid);
	return $result;
}

function register($username, $password, $lastname, $firstname, $phone, $email, $adress) {
	$conn = oci_connect('MARIUTA', 'MARIUTA', "//localhost:1521");
	$sql = 'BEGIN :result := register(:p_username, :p_parola, :p_nume, :p_prenume, :p_telefon, :p_email, :p_adresa); END;';
	$stid = oci_parse($conn, $sql);
	oci_bind_by_name($stid, ':p_username', $username);
	oci_bind_by_name($stid, ':p_parola', $password);
	oci_bind_by_name($stid, ':p_nume', $lastname);
	oci_bind_by_name($stid, ':p_prenume', $firstname);
	oci_bind_by_name($stid, ':p_telefon', $phone);
	oci_bind_by_name($stid, ':p_email', $email);
	oci_bind_by_name($stid, ':p_adresa', $adress);
	oci_bind_by_name($stid, ':result', $result);
	oci_execute($stid);

	// NU exista deja un client cu combinatia asta de username parola email
	// adica se poate adauga user-ul
	if($result == 1) {
		$sql5 = 'begin :id_inserare := idInserare; end;';
		$stid5= oci_parse($conn, $sql5);
		oci_bind_by_name($stid5, ':id_inserare', $id_inserare);
		oci_execute($stid5);
		
		$sql4 = 'begin inserare(:id_inserare, :p_username, :p_parola, :p_nume, :p_prenume, :p_telefon, :p_email, :p_adresa); end;';
		$stid4= oci_parse($conn, $sql4);
		oci_bind_by_name($stid4, ':id_inserare', $id_inserare);
		oci_bind_by_name($stid4, ':p_username', $username);
		oci_bind_by_name($stid4, ':p_parola', $password);
		oci_bind_by_name($stid4, ':p_nume', $lastname);
		oci_bind_by_name($stid4, ':p_prenume', $firstname);
		oci_bind_by_name($stid4, ':p_telefon', $phone);
		oci_bind_by_name($stid4, ':p_email', $email);
		oci_bind_by_name($stid4, ':p_adresa', $adress);
		oci_execute($stid4);
	}
}