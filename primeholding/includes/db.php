<?php
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "workforce";

$conn = mysqli_connect($serverName, $dbUsername,$dbPassword, $dbName);

if(!$conn) {
    die("connection failed: ". mysqli_connect_error($conn));
}