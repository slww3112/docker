<?php
$host       = "185.245.96.152";
$username   = "test";
$password   = "root";
$dbname     = "kontakt"; // will use later
$dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
$options    = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
$con = mysqli_connect($host, $username, $password, $dbname);