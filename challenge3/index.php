<?php require 'php/index.php'; ?>
<html class="text-dark" lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Der Wahre Onlineshop</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.reflowhq.com/v1/toolkit.min.css">
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
    <div class="container-fluid"><a class="navbar-brand bg-dark" style="color: rgba(255,255,255,0.9);" href="/index.php">Shop</a><button data-bs-toggle="collapse" class="navbar-toggler bg-dark" data-bs-target="#navcol-1" style="color: rgba(255,254,254,0.55);"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse bg-dark" id="navcol-1">
            <div class="collapse navbar-collapse bg-dark" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" style="color: rgba(255,255,255,0.9);" data-bs-target="index.php" href="/index.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about.html" style="color: rgba(255,255,255,0.9);">Ãœber uns</a></li>
                    <li class="nav-item"><a class="nav-link" href="/Kontakt.php" style="color: rgba(255,255,255,0.9);">Kontakt</a></li>
                    <li class="nav-item"><a class="nav-link active" style="color: rgba(255,255,255,0.9);" data-bs-target="index.php" href="/login.php">Login</a></li>
                </ul>
            </div><a class="btn btn-primary" role="button" href="/cart.php">Cart</a><a class="btn btn-primary" role="button" href="php/logoutsession.php" style="margin-left: 10px;">Logout</a>    </div>
</nav>

<section class="bg-dark photo-gallery">
    <div class="container bg-dark" style="color: rgb(255,255,255);background: rgb(253,254,255);">
        <div class="bg-dark intro">
            <h2 class="text-center bg-dark" style="color: rgb(255,255,255);">E-Commerce ganz einfach!</h2>
            <p class="text-center bg-dark" style="color: rgb(255,255,255);">PLATZHALTER</p>
        </div>
        <div class="bg-dark flex-shrink-0" data-reflow-type="product-list" data-reflow-layout="cards" data-reflow-page="1" data-reflow-perpage="6" data-reflow-order="date_desc" style="padding-right: 75px;padding-left: 75px;color: #ffffff;background: rgb(242,242,242);transform: scale(0.97);">
            <div class="reflow-product-list ref-cards">
                <div class="ref-products">
                    <?php for($i=0;$i<=$count-1;$i++){ ?>
                    <a class="ref-product" href="/product.php?product=<?php echo $names[$i]; ?>">
                    <!-- Product image-->
                    <img class="ref-image" src="<?php echo $images[$i]; ?>" height="210"/>
                    <!-- Product details-->
                    <div class="ref-product-data">
                        <div class="ref-product-data">
                            <!-- Product name-->
                            <h5 class="ref-name"><?php echo $names[$i]; ?></h5>
                            <!-- Product reviews-->
                        </div>
                        <!-- Product price-->
                        <p class="ref-price"><?php echo $prices[$i]; ?> €</p>
                    </div>
                    <!-- Product actions-->
            </a>
            <?php } ?>
            </div>
        </div>
    </div>
    </div>
    <div class="container" style="padding-top: 60px;">
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
                    <div class="col item social" style="padding-top: 10px;"><a href="https://anime.knownasmomo.de"><i class="icon ion-social-javascript"></i></a><a href="https://anime.knownasmomo.de"><i class="icon ion-stats-bars"></i></a></div>
                </div>
            </div>
            <p style="text-align: center;">Copyright</p>
        </footer>
    </div>
</section>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/Lightbox-Gallery.js"></script>
<script src="assets/js/Simple-Slider.js"></script>


</body></html>