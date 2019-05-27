<?php
require_once '../utilities/connection.php';

$database_rounds = $database->select("rounds_db", [ "budget", "participants_number", "date", "user_id"]);






