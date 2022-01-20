<?php


// Username doesnt exists, insert new account
require "kontakt_config.php";

if (isset($_POST['name'])) {
    require "kontakt_config.php";

    if ($stmt = $con->prepare('INSERT INTO kontakt.kontakt(name, email, message) VALUES (?, ?,?)')) {
        // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
        $stmt->bind_param('sss', $_POST['name'], $_POST['email'], $_POST['message']);
        $stmt->execute();
    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';

    }
}