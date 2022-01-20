<?php
$host       = "185.245.96.152";
$username   = "test";
$password   = "root";
$dbname     = "onlineshop"; // will use later
$dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
$options    = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);