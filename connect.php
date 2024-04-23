<?php
$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = 'prepa123';
$DATABASE = 'restaurante';

$conn = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>