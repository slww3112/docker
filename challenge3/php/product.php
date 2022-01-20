<?php
if (isset($_POST)) {
    $item = $_GET["product"];
    $link = mysqli_connect('185.245.96.152', 'test', 'root');
    if (!$link) {
        die('Verbindung schlug fehl: ' . mysqli_error());
    } else {
        $sql = "use onlineshop;";
        mysqli_query($link, $sql);
        $sql = "select image from item where name = '$item';";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            echo 'Das war nichts!';
        } else {
            $row = mysqli_fetch_assoc($result);
            foreach ($row as $cname => $cvalue) {
                $count = $cvalue;
            }
        }
        $image = $cvalue;
        $sql = "select price from item where name = '$item';";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            echo 'Das war nichts!';
        } else {
            $row = mysqli_fetch_assoc($result);
            foreach ($row as $cname => $cvalue) {
                $count = $cvalue;
            }
        }
        $price = $cvalue;
        $name = $item;
    }
}
?>