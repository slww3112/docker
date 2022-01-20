<html class="text-dark" lang="en">
<?php
require 'php/product.php';
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>test2</title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/mcstudios/glightbox@3.1.0/dist/css/glightbox.min.css"></head>
<script>
    if (!localStorage.getItem('<?php echo $name ?>')) {
        localStorage.setItem('<?php echo $name ?>', '0');
    }
    function runAdd() {
        var count = parseInt(document.getElementById('item_count').getAttribute('value'));
        localStorage.setItem('<?php echo $name ?>',count);
        console.log(count);
    }
    function runAmountPlus() {
        console.log('plus 1');
        document.getElementById('item_count').setAttribute('value', parseInt(document.getElementById('item_count').getAttribute('value'))+1);
        if (parseInt(document.getElementById('item_count').getAttribute('value'))==2)
        {
            document.getElementById('minus').style = 'pointer-events: auto';
        }
    }
    function runAmountMinus() {
        console.log('minus 1');
        document.getElementById('item_count').setAttribute('value', parseInt(document.getElementById('item_count').getAttribute('value'))-1);
        if (parseInt(document.getElementById('item_count').getAttribute('value'))==1)
        {
            document.getElementById('minus').style = 'pointer-events: none';
        }
    }
</script>
<body class="text-dark" style="background: var(--bs-dark);">
<nav class="navbar navbar-light navbar-expand-md textdark text-dark">
    <div class="container-fluid"><a class="navbar-brand bg-dark" style="color: rgba(255,255,255,0.9);" href="/index.php">Shop</a><button data-bs-toggle="collapse" class="navbar-toggler bg-dark" data-bs-target="#navcol-1" style="color: rgba(255,254,254,0.55);"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse bg-dark" id="navcol-1">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" style="color: rgba(255,255,255,0.9);" data-bs-target="index.php" href="/index.php">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="/about.html" style="color: rgba(255,255,255,0.9);">Über uns</a></li>
                <li class="nav-item"><a class="nav-link" href="/Kontakt.html" style="color: rgba(255,255,255,0.9);">Kontakt</a></li>
                <li class="nav-item"><a class="nav-link active" style="color: rgba(255,255,255,0.9);" data-bs-target="index.php" href="/login.php">Login</a></li>
            </ul>
        </div><a class="btn btn-primary" role="button" href="/cart.php">Cart</a><a class="btn btn-primary" role="button" href="/logoutsession.php" style="margin-left: 10px;">Logout</a>    </div>
</nav>
<section class="contact-clean" style="background: var(--bs-gray-900);padding-bottom: 0px;">
    <div class="container">
        <p class="copyright">Company Name © 2022</p>
    </div>
    <div class="container">
        <div data-reflow-type="product" data-bss-dynamic-product="" data-bss-dynamic-product-param="product" data-reflow-shoppingcart-url="cart.php" style="color: rgb(149,149,149);padding-right: 20px;padding-left: 30px;">
            <div class="reflow-product">
                <div class="ref-media">
                    <div class="ref-preview">
                        <img class="ref-image active" src="<?php echo $image; ?>" data-reflow-preview-type="image">
                    </div>
                </div>
                <div class="ref-product-data">
                    <h2 class="ref-name"><?php echo $name ?></h2>
                    <strong class="ref-price"><?php echo $price ?> €</strong>
                    <span data-reflow-type="add-to-cart" data-reflow-shoppingcart-url="cart.php">
                        <div class="ref-product-controls">
                            <div class="ref-quantity-widget">
				<div class="ref-decrease" style="pointer-events: none" id="minus">-</div>
				<input type="text" id="item_count" value="1">
				<div class="ref-increase" id ="plus">+</div>
			</div><a href="#" class="ref-button" id="add">Add to Cart</a></div></span><div class="ref-description"><p>gaming.gg</p></div></div></div></div>
    </div>
</section>
<section class="contact-clean" style="background: var(--bs-gray-900);">
    <div class="container">
        <p class="copyright">Company Name © 2022</p>
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
                        <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p>
                    </div>
                    <div class="col item social"><a href="https://anime.Knownasmomo.de" data-bs-target="https://anime.knownasmomo.de"><i class="icon ion-social-angular"></i></a><a href="https://anime.Knownasmomo.de"><i class="icon ion-fireball"></i></a>
                        <p style="color: var(--bs-gray-500);">Copyright 2022</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</section>
<script>
    document.getElementById('add').addEventListener('click',runAdd);
    document.getElementById('plus').addEventListener('click',runAmountPlus);
    document.getElementById('minus').addEventListener('click',runAmountMinus);
</script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/Lightbox-Gallery.js"></script>
<script src="assets/js/Simple-Slider.js"></script>


<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox@3.1.0/dist/js/glightbox.min.js"></script></body></html>