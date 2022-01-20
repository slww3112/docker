<?php
require 'shopconfig.php';
require "add_product_backend.php";

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
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Map-Clean.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Testimonials.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body class="text-dark" style="background: var(--bs-dark);">
 <nav class="navbar navbar-light navbar-expand-md textdark text-dark">
        <div class="container-fluid"><a class="navbar-brand bg-dark" style="color: rgba(255,255,255,0.9);" href="../index.php">Shop</a><button data-bs-toggle="collapse" class="navbar-toggler bg-dark" data-bs-target="#navcol-2" style="color: rgba(255,254,254,0.55);"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse bg-dark" id="navcol-2">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="add_user.php" style="color: rgba(255,255,255,0.9);">Add User</a></li>
                    <li class="nav-item"><a class="nav-link" href="productlist.php" style="color: rgba(255,255,255,0.9);">Product List</a></li>
                    <li class="nav-item"><a class="nav-link" href="orders.php" style="color: rgba(255,255,255,0.9);">Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="manage_user.php" style="color: rgba(255,255,255,0.9);">Manage</a></li>
                    <li class="nav-item"><a class="nav-link active" style="color: rgba(255,255,255,0.9);" data-bs-target="../index.php" href="couponlist.php">Coupon List</a></li>
                </ul>
            </div><a class="btn btn-primary" role="button" href="../php/logoutsession.php" style="margin-left: 10px;">Logout</a>
        </div>
    </nav><section class="bg-dark photo-gallery">
    <div class="container bg-dark" style="color: rgb(255,255,255);background: rgb(253,254,255);">
        <div class="bg-dark intro">
            <p class="text-center bg-dark" style="color: rgb(255,255,255);"></p>
        </div>
    </div>
</section>
<section class="contact-clean" style="background: var(--bs-gray-900);">
    <form method="post" style="background: var(--bs-gray-800);padding-bottom: 60px;max-width: 500px;margin: 0 auto">
        <h2 class="text-center" style="color: rgb(255,255,255);">Add Product</h2>
        <div class="mb-3"><input class="form-control" type="text" id="name" name="name" placeholder="Product Name" style="background: #c6c6c6;">
            <div class="mb-3"><input class="form-control" type="text" id="price" name="price" placeholder="Price(int or double)" style="background: #c6c6c6;margin-top: 20px;">
                <div class="mb-3"><input class="form-control" type="text" id="image" name="image" placeholder="Image" style="background: #c6c6c6;margin-top: 20px;"></div>
            </div>
        </div>
        <div class="mb-3"><textarea class="form-control" name="message" id="message" placeholder="Message" rows="14" style="background: #c6c6c6;"></textarea></div>
        <div class="mb-3"><button class="btn btn-primary" type="submit">ADD</button></div>
    </form>
    <div class="container">
        <p class="copyright">Company Name © 2022</p>
    </div>
    <div class="container">
        <footer class="footer-dark">
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
                        <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p>
                    </div>
                    <div class="col item social"><a href="https://anime.Knownasmomo.de"><i class="icon ion-social-angular"></i></a><a href="https://anime.Knownasmomo.de"><i class="icon ion-fireball"></i></a>
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