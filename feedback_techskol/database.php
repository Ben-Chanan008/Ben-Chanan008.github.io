<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'bench');
define('DB_PASS', '.boss008');
define('DB_DATABASE', 'feed_techskol');

$conn = new mysqli(DB_HOST, DB_NAME, DB_PASS, DB_DATABASE);

if ($conn->connect_error) {
	die('Connection Failed: ' . $conn->connect_error);
}
//echo 'YOU ARE IN';
?>