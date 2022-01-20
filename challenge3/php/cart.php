<?php
if (isset($_POST)) {
    if (sizeof($_POST) == 0) {
        global $body_array;
        $body_array = json_encode(file_get_contents('php://input'));
        $body_array = json_decode($body_array, true);
        $body_array = explode(',', $body_array);
        for ($counter = 0; $counter < sizeof($body_array); $counter++) {
            $body_array[$counter] = explode(':', $body_array[$counter]);
            if ($counter == 0) {
                $body_array[$counter][0] = substr($body_array[$counter][0], 1, strlen($body_array[$counter][0]) - 1);
            } else if ($counter == sizeof($body_array) - 1) {
                $body_array[$counter][1] = substr($body_array[$counter][1], 0, strlen($body_array[$counter][1]) - 1);
            }
        }
        for ($counter = 0; $counter < sizeof($body_array); $counter++) {
            $link = mysqli_connect('185.245.96.152', 'test', 'root');
            if (!$link) {
                die('Verbindung schlug fehl: ' . mysqli_error());
            } else {
                $sql = "use onlineshop;";
                mysqli_query($link, $sql);
                $name = $body_array[$counter][0];
                $sql = "select image from item where name = $name;";
                $result = mysqli_query($link, $sql);
                if (!$result) {
                    echo 'Das war nichts!';
                } else {
                    $row = mysqli_fetch_assoc($result);
                    foreach ($row as $cname => $cvalue) {
                        $count = $cvalue;
                    }
                }
                $body_array[$counter][2] = $cvalue;
                $sql = "select price from item where name = $name;";
                $result = mysqli_query($link, $sql);
                if (!$result) {
                    echo 'Das war nichts!';
                } else {
                    $row = mysqli_fetch_assoc($result);
                    foreach ($row as $cname => $cvalue) {
                        $count = $cvalue;
                    }
                }
                $body_array[$counter][3] = $cvalue;
            }

        }
        echo json_encode($body_array);
    }
    else {
        $coupon_code = $_POST['value'];
        $link = mysqli_connect('185.245.96.152', 'test', 'root');
        if (!$link) {
            die('Verbindung schlug fehl: ' . mysqli_error());
        } else {
            $sql = "use onlineshop;";
            mysqli_query($link, $sql);
            $sql = "select Type, coupon_value from coupon where coupon_code = '$coupon_code';";
            $result = mysqli_query($link, $sql);
            while(list($type,$value)=mysqli_fetch_array($result))
            {
                echo $type;
                echo '.';
                echo $value;
            }
        }
    }
}
?>