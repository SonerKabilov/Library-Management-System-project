<?php

$host= 'localhost';
$dbUser= 'root';
$dbPass= '';
$dbName= 'library';

$conn = mysqli_connect($host, $dbUser, $dbPass, $dbName);

if(!$conn){
	die("Connection failed".mysql_connect_error());
}