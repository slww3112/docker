<?php

require "test_backend.php";


session_start();

if (!isset($_SESSION['uname'])) {
    header("Location: AddProduct.php");
}


