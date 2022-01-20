<?php
echo 'Im backend!';
$link = mysqli_connect('185.245.96.152', 'test', 'root');
if (!$link) {
    die('Verbindung schlug fehl: ' . mysqli_error());
}
else {
    $sql = "show databases;";
    $result = mysqli_query($link,$sql);
    if (!$result) {
        echo 'Das war nichts!';
    }
    else {
        while($row = mysqli_fetch_assoc($result)){
            foreach($row as $cname => $cvalue){
                print "$cname: $cvalue\t";
            }
            print "\r\n";
        }
    }
}
echo 'Erfolgreich verbunden';
mysqli_close($link);
if (isset($_POST['first_name'])) {
    echo 'im if';
    require "config.php";
    require "common.php";
    $duplikat = "";

    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $new_user = array(
            "first_name" => $_POST['first_name']
        );

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "users",
            implode(", ", array_keys($new_user)),
            ":" . implode(", :", array_keys($new_user))
        );
        $errorcode = 0;
        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
        http_response_code(201);
    } catch(PDOException $error) {
        $errorcode = $error->getCode();
        http_response_code(400);

    }

    if ($errorcode === "23000") {
        $duplikat = "Dieser eintrag exestiert bereits!";
    }

    echo $duplikat;
}



?>
