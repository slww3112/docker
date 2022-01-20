<html class="text-dark" lang="en"><head>
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
</head>
<script>
    var test = [];
    var xhr =  new XMLHttpRequest();
    xhr.open('post','/php/cart.php');
    var data  = {}
    for (let i  = 0; i<localStorage.length;i++) {
        if (localStorage.key(i) != 'discount') {
            data[localStorage.key(i)] = localStorage.getItem(localStorage.key(i));
        }
    }
    data = JSON.stringify(data);
    xhr.send(data);
    xhr.onload = function() {
        localStorage.setItem('discount','1.0');
        test  = JSON.parse(xhr.response);
        for (let i = 0;i<test.length;i++) {
            var str = test[i][0];
            const regex = /[^A-Za-z0-9]/g;
            var newStr = str.replace(regex, "");
            test[i][0] = newStr;
            str = test[i][1];
            newStr = str.replace(regex, "");
            test[i][1] = newStr;
        }
        for (let i  = 0; i<test.length;i++) {
            if (test[i][0] != 'discount') {
                document.getElementById('cart_table').innerHTML = document.getElementById('cart_table').innerHTML + `<div class="ref-product" id="col` + test[i][0] + `">
        <div class="ref-product-col">
            <div class="ref-product-wrapper">
                <img class="ref-product-photo" src="` + test[i][2] + `" alt=` + test[i][0] + `>
                    <div class="ref-product-data">
                        <div class="ref-product-info">
                            <div class="ref-product-name">` + test[i][0] + `</div>
                            <div class="ref-product-category">Product</div>
                            <div class="ref-product-variants"></div>
                        </div>
                        <div class="ref-product-price">` + test[i][3] + ` €</div>
                    </div>
            </div>
        </div>
        <div class="ref-price-col">
            <div class="ref-product-price">` + test[i][3] + ` €</div>
        </div>
        <div class="ref-quantity-col">
            <div class="ref-product-quantity">
                <div class="ref-quantity-widget">
                    <div class="ref-decrease" id="minus` + test[i][0] + `">-</div>
				<input type="text" id="item_count` + test[i][0] + `" value="` + test[i][1] + `" style="pointer-events: none">
				<div class="ref-increase" id ="plus` + test[i][0] + `">+</div>
                </div>
                <div class="ref-product-remove" id="` + test[i][0] + `">Remove</div>
            </div>
        </div>
        <div class="ref-total-col">
            <div class="ref-product-total">
                <div class="ref-product-total-sum" id="total` + test[i][0] + `">` + parseInt(test[i][3]) * parseInt(test[i][1]) + ` €</div>
            </div>
        </div>
    </div>`;
            }
        }
        for (let i  = 0; i<test.length;i++) {
            if (test[i][0] != 'discount') {
                document.getElementById(test[i][0]).addEventListener("click", function () {
                    run(i);
                }, false);
                document.getElementById(`plus${test[i][0]}`).addEventListener('click', function () {
                    runAmountPlusItem(i);
                }, false);
                document.getElementById(`minus${test[i][0]}`).addEventListener('click', function () {
                    runAmountMinusItem(i);
                }, false);
                if (parseInt(document.getElementById(`item_count${test[i][0]}`).getAttribute('value')) == 1) {
                    document.getElementById(`minus${test[i][0]}`).style = 'pointer-events: none';
                }
            }
        }
        var type = localStorage.getItem('discount').split('.')[0];
        var value = localStorage.getItem('discount').split('.')[1];
        if (type == '0') {
            document.getElementById('subtotal').innerText = `Subtotal: ${subtotal() * ((100 - parseInt(value))/100)} €`;
        }
        else {
            document.getElementById('subtotal').innerText = `Subtotal: ${subtotal() - parseInt(value)} €`;
        }
    }
    function run(x) {
        document.getElementById(`col${test[x][0]}`).remove();
        localStorage.removeItem(test[x][0]);
        test[x][1] = 0;
        document.getElementById('subtotal').innerText = `Subtotal: ${subtotal()} €`;
    }
    function runAmountPlusItem(x) {
        document.getElementById(`item_count${test[x][0]}`).setAttribute('value', parseInt(document.getElementById(`item_count${test[x][0]}`).getAttribute('value'))+1);
        test[x][1] = document.getElementById(`item_count${test[x][0]}`).getAttribute('value');
        localStorage.setItem(test[x][0], document.getElementById(`item_count${test[x][0]}`).getAttribute('value'));
        if (parseInt(document.getElementById(`item_count${test[x][0]}`).getAttribute('value'))==2)
        {
            document.getElementById(`minus${test[x][0]}`).style = 'pointer-events: auto';
        }
        document.getElementById(`total${test[x][0]}`).innerText = parseInt(test[x][1]) * parseInt(test[x][3]) + ' €';
        var type = localStorage.getItem('discount').split('.')[0];
        var value = localStorage.getItem('discount').split('.')[1];
        if (type == '0') {
            document.getElementById('subtotal').innerText = `Subtotal: ${subtotal() * ((100 - parseInt(value))/100)} €`;
        }
        else {
            document.getElementById('subtotal').innerText = `Subtotal: ${subtotal() - parseInt(value)} €`;
        }
    }
    function runAmountMinusItem(x) {
        document.getElementById(`item_count${test[x][0]}`).setAttribute('value', parseInt(document.getElementById(`item_count${test[x][0]}`).getAttribute('value'))-1);
        test[x][1] = document.getElementById(`item_count${test[x][0]}`).getAttribute('value');
        localStorage.setItem(test[x][0], document.getElementById(`item_count${test[x][0]}`).getAttribute('value'));
        if (parseInt(document.getElementById(`item_count${test[x][0]}`).getAttribute('value'))==1)
        {
            document.getElementById(`minus${test[x][0]}`).style = 'pointer-events: none';
        }
        document.getElementById(`total${test[x][0]}`).innerText = parseInt(test[x][1]) * parseInt(test[x][3]) + ' €';
        var type = localStorage.getItem('discount').split('.')[0];
        var value = localStorage.getItem('discount').split('.')[1];
        if (type == '0') {
            document.getElementById('subtotal').innerText = `Subtotal: ${subtotal() * ((100 - parseInt(value))/100)} €`;
        }
        else {
            document.getElementById('subtotal').innerText = `Subtotal: ${subtotal() - parseInt(value)} €`;
        }
    }
    function subtotal() {
        var subtotal = 0;
        for (let i  = 0; i<test.length;i++) {
            subtotal += test[i][3] * test[i][1];
        }
        return subtotal;
    }
    function coupon() {
        var data = new FormData();
        data.append('value', document.getElementById('coupon_input').value);
        xhr = new XMLHttpRequest();
        xhr.open('post', 'php/cart.php',);
        xhr.send(data);
        xhr.onload = function() {
            if (xhr.response != '')
            {
                document.getElementById('coupon_box').hidden = true;
                localStorage.setItem('discount', xhr.response);
                var type = xhr.response.split('.')[0];
                var value = xhr.response.split('.')[1];
                if (type == '0') {
                    document.getElementById('subtotal').innerText = `Subtotal: ${subtotal() * ((100 - parseInt(value))/100)} €`;
                }
                else {
                    document.getElementById('subtotal').innerText = `Subtotal: ${subtotal() - parseInt(value)} €`;
                }
            }
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
                <li class="nav-item"><a class="nav-link" href="/Kontakt.php" style="color: rgba(255,255,255,0.9);">Kontakt</a></li>
                <li class="nav-item"><a class="nav-link active" style="color: rgba(255,255,255,0.9);" data-bs-target="index.php" href="/login.php">Login</a></li>
            </ul>
        </nav>
<section class="contact-clean" style="background: var(--bs-gray-900);padding-bottom: 0px;">
    <div class="container">
        <p class="copyright" style="color: rgb(255,255,255);">Company Name © 2022</p>
    </div>
</section>
<div class="container">
    <div data-reflow-type="shopping-cart" style="color: #7f858c;">
        <div class="reflow-shopping-cart">
            <div class="ref-loading-overlay"></div>
            <div class="ref-message" style="display: none;"></div>
            <div class="ref-cart" style="display: block;">
                <div class="ref-heading">Shopping Cart</div>
                <div class="ref-th">
                    <div class="ref-product-col">Product</div>
                    <div class="ref-price-col">Price</div>
                    <div class="ref-quantity-col">Quantity</div>
                    <div class="ref-total-col">Total</div>
                </div>
                <div class="ref-cart-table" id="cart_table">
                </div>
                <div class="ref-footer">
                    <div class="ref-links"></div>
                    <div class="ref-totals">
                        <div class="ref-subtotal" id="subtotal"></div>
                        <div class="ref-shipping-taxes">Shipping and taxes are calculated<br> during checkout.</div>
                        <div id="coupon">
                        <div id="coupon_box">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Coupon</label>
                                <input type="text" id="coupon_input" class="form-control" required>
                            </div>
                            <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary pull-right" style="margin-top: 20px"  title="After applying order cannot be changed">Apply Coupon</button>
                        </div>
                        <script>
                            document.getElementById('btn_save').addEventListener('click',coupon);
                        </script>
                        </div>
                        <div class="btn btn-primary" role="button" href="/checkout.php">Cart</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<script src="assets/js/Lightbox-Gallery.js"></script>
<script src="assets/js/Simple-Slider.js"></script>


</body></html>