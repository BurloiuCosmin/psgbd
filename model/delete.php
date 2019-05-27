<?php
require_once '../utilities/connection.php';

$person_id=$_GET['id'];

$database->delete("persons_db", [ 'person_id[=]'=>$person_id ]);

header( 'location: ../view/persons.php' );