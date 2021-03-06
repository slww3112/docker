<?php
include("db_kauf.php");
if (isset($_POST)){
    $return = [];
    $i = 0;
    foreach ($_POST as $key => $value) {
        //do something
        $return[$key] = $value;
        $i = $i +1;
    }
    $con = mysqli_connect('185.245.96.152', 'test', 'root', 'onlineshop');
    if ($stmt = $con->prepare('INSERT INTO onlineshop.users_info (first_name,last_name,email,mobile,address1,address2) VALUES (?, ?,?,?,?,?)')) {
        $stmt->bind_param('ssssss', $return['first_name'], $return['last_name'], $_POST['email'],$return['phone'],$return['country'],$return['city']);
        $stmt->execute();
    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';
    }
    $email = $return['email'];
    $result = mysqli_query($con,"select user_id from onlineshop.users_info where email = '$email';");
    while(list($user_id)=mysqli_fetch_array($result)){
        $usr_id = $user_id;
    }
    if ($stmt = $con->prepare('INSERT INTO onlineshop.bestellung (user,price) VALUES (?, ?)')) {
        $stmt->bind_param('sd', $usr_id, $return['total']);
        $stmt->execute();
    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';
    }
    $result = mysqli_query($con,"select ID from onlineshop.bestellung where user = '$usr_id' order by ID desc limit 1;");
    while(list($bestellung_id)=mysqli_fetch_array($result)){
        $bes_id = $bestellung_id;
    }
    foreach($return as $key => $item) {
        if ($key != 'first_name' && $key != 'last_name' && $key != 'email' && $key != 'phone' && $key != 'city' && $key != 'country' && $key != 'total') {
            $result = mysqli_query($con,"select id from onlineshop.item where name = '$key';");
            while(list($item_id)=mysqli_fetch_array($result)){
                $itemid = $item_id;
            }
            if ($stmt = $con->prepare('INSERT INTO onlineshop.bestellungitem (bes_id,item_id,amount) VALUES (?, ?,?)')) {
                $stmt->bind_param('iii', $bes_id, $itemid, $item);
                $stmt->execute();
            } else {
                // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
                echo 'Could not prepare statement!';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html class="text-dark" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>test2</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Article-List.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery.css">
    <link rel="stylesheet" href="assets/css/Map-Clean.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Testimonials.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>
<body class="text-dark" style="background: var(--bs-dark);">
<nav class="navbar navbar-light navbar-expand-md textdark text-dark">
    <div class="container-fluid"><a class="navbar-brand bg-dark" style="color: rgba(255,255,255,0.9);"
                                    href="/index.html">Shop</a>
        <button data-bs-toggle="collapse" class="navbar-toggler bg-dark" data-bs-target="#navcol-1"
                style="color: rgba(255,254,254,0.55);"><span class="visually-hidden">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse bg-dark" id="navcol-1">
            <div class="collapse navbar-collapse bg-dark" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" style="color: rgba(255,255,255,0.9);"
                                            data-bs-target="index.html" href="/index.html">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about.html" style="color: rgba(255,255,255,0.9);">????ber
                            uns</a></li>
                    <li class="nav-item"><a class="nav-link" href="/Kontakt.php" style="color: rgba(255,255,255,0.9);">Kontakt</a>
                    </li>
                    <li class="nav-item"><a class="nav-link active" style="color: rgba(255,255,255,0.9);"
                                            data-bs-target="index.html" href="/login.php">Login</a></li>
                </ul>
            </div>
            <a class="btn btn-primary" role="button" href="/cart.php">Cart</a></div>
</nav>
<section class="contact-clean" style="background: var(--bs-gray-900);padding-bottom: 0px;">
    <h1 style="color: rgb(255,255,255);text-align: center;">Order Confirmed!</h1>
    <p style="color: rgb(255,255,255);text-align: center;">Thanks for Buying our Product</p>
</section>
<div class="container">
    <section class="map-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Location </h2>
                <p class="text-center">Currently in Tokyo</p>
            </div>
        </div>
        <iframe allowfullscreen="" frameborder="0"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCmTL6wxVJdxWaYx9sMD3tmQDD9CnZeJWw&amp;q=tokyo&amp;zoom=15"
                width="100%" height="450"></iframe>
    </section>
</div>
<section class="contact-clean" style="background: var(--bs-gray-900);">
    <div class="container">
        <p class="copyright">Company Name ???? 2022</p>
    </div>
    <div class="container">
        <footer class="footer-dark" style="padding-top: 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Company Name</h3>
                        <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula
                            rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum
                            vel in justo.</p>
                    </div>
                    <div class="col item social"><a href="https://anime.Knownasmomo.de"
                                                    data-bs-target="https://anime.knownasmomo.de"><i
                                    class="icon ion-social-angular"></i></a><a href="https://anime.Knownasmomo.de"><i
                                    class="icon ion-fireball"></i></a>
                        <p style="color: var(--bs-gray-500);">Copyright 2022</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</section>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
<script src="assets/js/Lightbox-Gallery.js"></script>
<script src="assets/js/Simple-Slider.js"></script>
</body>

</html>
