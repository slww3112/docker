<?php
$servername = "185.245.96.152";
$username = "test";
$password = "root";
$db = "onlineshop";

// Create connection
$con = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


