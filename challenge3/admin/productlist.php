<?php
include("db.php");
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete') {
    $product_id = $_GET['product_id'];


    if (isset($_GET['action']) && $_GET['action'] != "" && $_GET['action'] == 'delete') {
        $product_id = $_GET['product_id'];

        /*this is delet quer*/
        mysqli_query($con, "delete from item where id='$product_id'") or die("query is incorrect...");
    }


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
<div class="col-md-14" style="max-width: 1000px;margin: 0 auto">
    <div class="card ">
        <div class="card-header card-header-primary">
            <h4 class="card-title"> Products List</h4>

        </div>
        <div class="card-body">
            <div class="table-responsive ps">
                <table class="table tablesorter " id="page1">
                    <thead class=" text-primary">
                    <tr><th>Name</th><th>Price</th><th>
                            <a class=" btn btn-primary" href="AddProduct.php">Add New</a></th></tr></thead>
                    <tbody>
                    <?php

                    $result=mysqli_query($con,"select id, name,price from item Limit $page1,12")or die ("query 1 incorrect.....");

                    while(list($product_id,$product_name,$price)=mysqli_fetch_array($result))
                    {
                        echo "<tr><td>$product_name</td>
                        <td>$price</td>
                        <td>

                         <a href='productlist.php?product_id=$product_id&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger' data-original-title='Delete Product'>
                                <i class='material-icons'>Delete</i>
                        </td></tr>";
                    }

                    ?>
                    </tbody>
                </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
        </div>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php
            //counting paging

            $paging=mysqli_query($con,"select id,image, name,price from item");
            $count=mysqli_num_rows($paging);

            $a=$count/10;
            $a=ceil($a);

            for($b=1; $b<=$a;$b++)
            {
                ?>
                <li class="page-item"><a class="page-link" href="productlist.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <?php
            }
            ?>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>



</div>


</div>
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