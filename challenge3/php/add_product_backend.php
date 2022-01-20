<?php

// Username doesnt exists, insert new account
require 'shopconfig.php';

if (isset($_POST['name'])) {
    echo 'im if';
    require "shopconfig.php";

    if ($stmt = $con->prepare('INSERT INTO onlineshop.item (name,price,image,message) VALUES (?, ?,?,?)')) {
        // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
        $stmt->bind_param('ssss', $_POST['name'], $_POST['price'], $_POST['image'], $_POST['message']);
            $stmt->execute();
        echo 'You have successfully registered, you can now login!';
    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';

    }}