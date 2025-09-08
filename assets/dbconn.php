<?php

$hostName = 'localhost';
$userName = 'root';
$password = '';
$databaseName = 'master_db';

$connection = mysqli_connect($hostName, $userName, $password, $databaseName);
if(!$connection){
    die("Connection failed. Error: " . mysqli_connect_error());
}

?>