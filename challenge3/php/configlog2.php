<?php

session_start();

$host = "185.245.96.152"; /* Host name */
$user = "test"; /* User */
$password = "root"; /* Password */
$dbname = "mitarbeiter"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}