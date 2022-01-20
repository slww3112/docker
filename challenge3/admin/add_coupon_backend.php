<?php

// Username doesnt exists, insert new account
require 'shopconfig.php';

if (isset($_POST['value'])) {
    require "shopconfig.php";
    if (isset($_POST['type'])){
        $type = 1;
    }
    else {
        $type = 0;
    }
    if ($stmt = $con->prepare('INSERT INTO onlineshop.coupon (Type,coupon_value,coupon_code) VALUES (?, ?,?)')) {
        // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
        $stmt->bind_param('iis', $type, $_POST['value'], $_POST['code']);
        $stmt->execute();
    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';

    }}