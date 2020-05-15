<?php
session_start();

$host="34.72.10.140";
$port=3306;
$socket="";
$user="root";
$password="tkdlove";
$dbname="crud";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

?>