<?php
$mysqli = new mysqli("localhost", "root", "", "budget");
if ($mysqli === false) {
die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
