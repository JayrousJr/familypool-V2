<?php
$mysqli = require __DIR__ ."/database.php";

$sql = sprintf("SELECT * FROM applicant_tb WHERE email = '%s'",
			   $mysqli->real_escape_string($_GET["email"]));
$result = $mysqli->query($sql);

$is_available = $result->num_rows === 0;

header("Content-Type: application/json");

echo json_encode(["available" => $is_available]); 
?>
<?php /*?>
<?php
$mysqli = require __DIR__ ."/database.php";

$sql = sprintf("SELECT * FROM applicant_tb WHERE phone = '%s'",
			   $mysqli->real_escape_string($_GET["phone"]));
$result = $mysqli->query($sql);

$is_available = $result->num_rows === 0;

header("Content-Type: application/json");

echo json_encode(["available" => $is_available]); 
?>
<?php
$mysqli = require __DIR__ ."/database.php";

$sql = sprintf("SELECT * FROM applicant_tb WHERE socialsecurityNumber = '%s'",
			   $mysqli->real_escape_string($_GET["socialsecurityNumber"]));
$result = $mysqli->query($sql);

$is_available = $result->num_rows === 0;

header("Content-Type: application/json");

echo json_encode(["available" => $is_available]); 
?>
<?php
$mysqli = require __DIR__ ."/database.php";

$sql = sprintf("SELECT * FROM applicant_tb WHERE einNumber = '%s'",
			   $mysqli->real_escape_string($_GET["einNumber"]));
$result = $mysqli->query($sql);

$is_available = $result->num_rows === 0;

header("Content-Type: application/json");

echo json_encode(["available" => $is_available]); 
?>
<?php */?>