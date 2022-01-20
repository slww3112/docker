<?php
$link = mysqli_connect('185.245.96.152', 'test', 'root');
if (!$link) {
    die('Verbindung schlug fehl: ' . mysqli_error());
}
else {
    $sql = "use onlineshop;";
    mysqli_query($link,$sql);
    $sql = "select count(id) from item;";
    $result = mysqli_query($link,$sql);
    if (!$result) {
        echo 'Das war nichts!';
    }
    else {
        $row = mysqli_fetch_assoc($result);
        foreach ($row as $cname => $cvalue) {
            $count =  $cvalue;
        }
    }
    $sql = 'select name from item;';
    $result = mysqli_query($link,$sql);
    if (!$result) {
        echo 'Das war nichts!';
    }
    else {
        $names  = array();
        while($row = mysqli_fetch_assoc($result)) {
            foreach ($row as $cname => $cvalue) {
                $names[] = $cvalue;
            }
        }
    }
    $sql = 'select price from item;';
    $result = mysqli_query($link,$sql);
    if (!$result) {
        echo 'Das war nichts!';
    }
    else {
        $prices  = array();
        while($row = mysqli_fetch_assoc($result)) {
            foreach ($row as $cname => $cvalue) {
                $prices[] = $cvalue;
            }
        }
    }
    $sql = 'select image from item;';
    $result = mysqli_query($link,$sql);
    if (!$result) {
        echo 'Das war nichts!';
    }
    else {
        $images  = array();
        while($row = mysqli_fetch_assoc($result)) {
            foreach ($row as $cname => $cvalue) {
                $images[] = $cvalue;
            }
        }
    }
}
?>
