<?php

// Username doesnt exists, insert new account
require 'config.php';

if (isset($_POST['uname'])) {
    echo 'im if';
    require "config.php";

    if ($stmt = $con->prepare('INSERT INTO mitarbeiter.users (username,password,name) VALUES (?, ?,?)')) {
        // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
        $stmt->bind_param('sss', $_POST['uname'], $_POST['upwd'], $_POST['name']);
        $stmt->execute();
        echo 'You have successfully registered, you can now login!';
    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';

    }}