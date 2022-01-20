<?php
if (isset($_POST)) {
    echo var_dump($_POST);
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $total = $_POST['total'];
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
<form id="myForm" action="sucess.php" method="post">
    <?php
    foreach ($_POST as $a => $b) {
        if ($a != 'submit') {
            echo '<input type="hidden" name="' . htmlentities($a) . '" value="' . htmlentities($b) . '">';
        }
    }
    ?>
</form>
<script>
    for (let i  = 0; i<localStorage.length;i++) {
        if (localStorage.key(i) != 'discount' && localStorage.key(i) != '__paypal_storage__') {
            document.getElementById('myForm').innerHTML += `<input type="hidden" name="`+localStorage.key(i)+`" value="`+localStorage.getItem(localStorage.key(i))+`">`;
        }
    }
</script>
<nav class="navbar navbar-light navbar-expand-md textdark text-dark">
    <div class="container-fluid"><a class="navbar-brand bg-dark" style="color: rgba(255,255,255,0.9);" href="/index.html">Shop</a><button data-bs-toggle="collapse" class="navbar-toggler bg-dark" data-bs-target="#navcol-1" style="color: rgba(255,254,254,0.55);"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse bg-dark" id="navcol-1">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" style="color: rgba(255,255,255,0.9);" data-bs-target="index.html" href="/index.html">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="/about.html" style="color: rgba(255,255,255,0.9);">Über uns</a></li>
                <li class="nav-item"><a class="nav-link" href="/Kontakt.html" style="color: rgba(255,255,255,0.9);">Kontakt</a></li>
                <li class="nav-item"><a class="nav-link active" style="color: rgba(255,255,255,0.9);" data-bs-target="index.html" href="/login.php">Login</a></li>
            </ul>
        </div><a class="btn btn-primary" role="button" href="/checkout.html">Cart</a><a class="btn btn-primary" role="button" href="/logoutsession.php" style="margin-left: 10px;">Logout</a>    </div>
</nav>
<div id="smart-button-container">
    <div style="text-align: center;margin-top: 200px;">
        <div id="paypal-button-container"></div>
    </div>
</div>
<div id="smart-button-container">
    <div style="text-align: center;">
        <div id="paypal-button-container"></div>
    </div>
</div>
<script src="https://www.paypal.com/sdk/js?client-id=AWw7WRJHCS0wN7FNagk6838MDuhDgejOZp_YRzHwqtJeSKNC7ijJLtG4r8qtYDQC923dYvg_OHRSjkcm&enable-funding=venmo&currency=EUR" data-sdk-integration-source="button-factory"></script>
 <script src="https://www.paypal.com/sdk/js?client-id=AWw7WRJHCS0wN7FNagk6838MDuhDgejOZp_YRzHwqtJeSKNC7ijJLtG4r8qtYDQC923dYvg_OHRSjkcm&currency=EUR"></script>

    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>

    <script>
      paypal.Buttons({

        // Sets up the transaction when a payment button is clicked
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: <?php echo $total; ?>
              }
            }]
          });
        },

        // Finalize the transaction after payer approval
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                document.getElementById('myForm').submit();
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // var element = document.getElementById('paypal-button-container');
            // element.innerHTML = '';
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        }
      }).render('#paypal-button-container');

    </script>
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
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
<script src="assets/js/Lightbox-Gallery.js"></script>
<script src="assets/js/Simple-Slider.js"></script>
</body>

</html>