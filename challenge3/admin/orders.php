<?php
session_start();
include("db.php");

error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
    $order_id=$_GET['order_id'];

    /*this is delet query*/
    mysqli_query($con,"delete from orders where order_id='$order_id'")or die("delete query is incorrect...");
}

///pagination
$page=$_GET['page'];

if($page=="" || $page=="1")
{
    $page1=0;
}
else
{
    $page1=($page*10)-10;
}

?>


<!DOCTYPE html>
<html class="text-dark" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>test2</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/Article-List.css">
    <link rel="stylesheet" href="../assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="../assets/css/Form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="../assets/css/Lightbox-Gallery.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="../assets/css/Map-Clean.css">
    <link rel="stylesheet" href="../assets/css/SIdebar-Responsive-2-1.css">
    <link rel="stylesheet" href="../assets/css/SIdebar-Responsive-2.css">
    <link rel="stylesheet" href="../assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/Team-Boxed.css">
    <link rel="stylesheet" href="../assets/css/Team-Clean.css">
    <link rel="stylesheet" href="../assets/css/Testimonials.css">
    <link rel="stylesheet" href="../assets/css/untitled.css">
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
    </nav>    <section class="bg-dark photo-gallery">
        <div class="container bg-dark" style="color: rgb(255,255,255);background: rgb(253,254,255);">
            <div class="bg-dark intro">
                <p class="text-center bg-dark" style="color: rgb(255,255,255);"></p>
            </div>
        </div>
    </section>
<div class="col-md-14">
    <div class="card" style="max-width: 1200px; margin:0 auto">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Orders  / Page <?php echo $page;?> </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive ps">
                <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                    <tr><th>Customer Name</th><th>Products</th><th>Contact | Email</th><th>Address</th><th>Details</th><th>Shipping</th><th>Time</th>
                    </tr></thead>
                    <tbody>
                    <?php
                    $result=mysqli_query($con,"select order_id, product_title, first_name, mobile, email, address1, address2, product_price,address2, qty from orders,products,user_info where orders.product_id=products.product_id and user_info.user_id=orders.user_id Limit $page1,10")or die ("query 1 incorrect.....");

                    while(list($order_id,$p_names,$cus_name,$contact_no,$email,$address,$country,$details,$zip_code,$time,$quantity)=mysqli_fetch_array($result))
                    {
                        echo "<tr><td>$cus_name</td><td>$p_names</td><td>$email<br>$contact_no</td><td>$address<br>ZIP: $zip_code<br>$country</td><td>$details</td><td>$quantity</td><td>$time</td>

                        <td>
                        <a class=' btn btn-danger' href='orders.php?order_id=$order_id&action=delete'>Delete</a>
                        </td></tr>";
                    }
                    ?>
                    </tbody>
                </table>

                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
        </div>
    </div>
    </div>
        </form>
        <div class="container">
            <p class="copyright">Company Name © 2022</p>
        </div>
        <div class="container">
            <footer class="footer-dark">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 item" style="max-width: 600px">
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
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="../assets/js/Lightbox-Gallery.js"></script>
    <script src="../assets/js/Simple-Slider.js"></script>
</body>

</html>