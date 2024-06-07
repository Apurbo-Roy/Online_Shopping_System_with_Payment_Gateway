<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>
<?php
include ('database.php');
include ('functions/function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>User Dashboard</title>
</head>
<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <!---
    <div id="page" class="site">
        <header>
            <div class="header-top">

                <ul class="flexitem">
                    <div><i aria-hidden="true" class="fa fa-user"></i><span><a href="#">My
                                Account</a></span></div>
                    <div><i aria-hidden="true" class="fas fa-shipping-fast"></i><span><a href="#">Order
                                Tracking</a></span></div>

                </ul>

            </div>
            <div class="logo">
                <div class="logoimg">
                    <img src="https://i.ibb.co/99Cf2Gg/Shoppifybd.png" alt="Shoppifybd" height="70px">
                </div>
                <div class="text1">
                    <h1>
                        <span style="color:#003E54">Wellcome to Shoppify</span>
                        <span style="color:#F6AE36">BD.</span>
                    </h1>

                </div>
            </div>

        </header>
        <header1>
            <div class="header-nav">
                <div class="container">
                    <div class="wrapper flexitem">
                        <div class="trigger desktop-hide">
                            <a href="#"></a><span><i aria-hidden="true" class="fa fa-bars"></i></span>

                        </div>
                    </div>
                </div>
            </div>
        </header1>


    </div>
--->


    <!--================== Navbar=================--->

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-body-light">
            <div class="container-fluid">
                <img src="https://i.ibb.co/c13hdHP/Shoppify-bd-white.png" alt="Shoppify-bd-white" height="65px">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="fa-solid fa-bars"><sub
                                        style="font-size: 10px; padding-left:5px;">category</sub></i>
                            </a>
                            <ul class="dropdown-menu text-black">
                                <?php
                                //-------------calling fuction for categories---------
                                
                                getcategory();
                                ?>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-truck"></i></a>
                        </li>

                    </ul>
                    <form class="d-flex" action="searchpro.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="search_data">
                        <!--<button class="btn btn-warning" type="submit">Search</button>-->
                        <input type="submit" value="Search" class="btn btn-outline-warning" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!---=============navbar 2==================--->
        <div class="bg-white p-0">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h1 style="text-align:center; margin-left:50px; flex: 1;">
                    <br>
                </h1>
                <div style="display: flex;">
                    <a class="nav-link" href="#" style="padding-right: 15px;">
                        <i class="fa-solid fa-user">
                            <span class="usacc"
                                style="font-size: 18px; padding-left: 0px; margin-top:0px; font-family: Josefin Sans, sans-serif;">
                                Profile
                            </span>
                        </i>
                    </a>
                    <button type="button" class="btn btn-outline-danger"
                        style="margin-right:15px; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                        <a href="logout.php" style="color: #003e54; text-decoration: none;">Log Out</a>
                    </button>
                </div>
            </div>


            <!---=============products formate======--->
            <div class="row">

                <div class="col-md-2 bg-white p-0">
                    <ul class="navbar-nav me-auto text-center">
                        <li class="nav-item bg-info">
                            <a href="#" class="nav-link text-white">
                                <h4 style="font-family:Josefin Sans, sans-serif; padding-top: 10px;">All Categories</h4>
                            </a>
                        </li>


                        <?php
                        //-------------calling fuction for categories---------
                        
                        getcategory();


                        /*$select_cat = "Select * from `cat`";
                        $result_cat = mysqli_query($conn, $select_cat);

                        while ($row_data = mysqli_fetch_assoc($result_cat)) {
                            $cat_name = $row_data['cat_name'];
                            $cat_id = $row_data['id'];
                            echo " <li class='nav-item'>
                            <a href='index.php' class='nav-link'></a>
                                <p>$cat_name</p>
                            </a>
                        </li>";

                        }
                        */
                        ?>

                        <!---===============================================================static data

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Men's Fashion</p>
                            </a>
                        </li>
                        <hr class="solid">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Women's Fashion</p>
                            </a>
                        </li>
                        <hr class="solid">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Personal Care</p>
                            </a>
                        </li>
                        <hr class="solid">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Electronics</p>
                            </a>
                        </li>
                        <hr class="solid">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Computer & Laptop components</p>
                            </a>
                        </li>
                        <hr class="solid">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Mobile Phones</p>
                            </a>
                        </li>
                        <hr class="solid">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Home Appliances</p>
                            </a>
                        </li>
                        <hr class="solid">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Sports</p>
                            </a>
                        </li>
                        <hr class="solid">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Fruits & Vegetables</p>
                            </a>
                        </li>
                        <hr class="solid">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Cooking Essentials</p>
                            </a>
                        </li>
                    </ul>

                    
                       ================================================== --->
                </div>


                <div class="col-md-10">
                    <!---============products========--->

                    <div class="row g-2">



                        <!---=================product show==========--------->
                        <?php
                        //-----------calling the function---------------
                        
                        viewmore();
                        get_uni_categories();

                        /*$select_query = "select * from `product` order by rand() ";
                        $result_query = mysqli_query($conn, $select_query);
                        while ($row = mysqli_fetch_assoc($result_query)) {
                            $proid = $row['pro_id'];
                            $protitle = $row['pro_title'];
                            $prodes = $row['pro_des'];
                            $proimg1 = $row['img1'];
                            $proprice = $row['price'];
                            $pro_catid = $row['id'];
                            echo "
                            <div class='col-md-3 mb-2 '>
                            <div class='card'>
                                <img src='./pro_img/$proimg1' class='card-img-top' alt='$protitle'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$protitle</h5>
                                    <p class='card-text' style='color: black;'>$prodes</p>
                                    <a href='#' class='btn btn-info'>Add to cart</a>
                                    <a href='#' class='btn btn-warning'>View More</a>
                                </div>
                            </div>
                        </div>";

                        }
                        */

                        ?>

                        <!--
                        <div class="col-md-3 mb-2 ">
                            <div class="card">
                                <img src=".\images\ban1.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-info">Add to cart</a>
                                    <a href="#" class="btn btn-warning">View More</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 mb-2 ">
                            <div class="card">
                                <img src=".\images\ban3.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-info">Add to cart</a>
                                    <a href="#" class="btn btn-warning">View More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="card">
                                <img src=".\images\ban5.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-info">Add to cart</a>
                                    <a href="#" class="btn btn-warning">View More</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-2">
                            <div class="card">
                                <img src=".\images\ban5.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-info">Add to cart</a>
                                    <a href="#" class="btn btn-warning">View More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="card">
                                <img src=".\images\ban5.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-info">Add to cart</a>
                                    <a href="#" class="btn btn-warning">View More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="card">
                                <img src=".\images\ban5.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-info">Add to cart</a>
                                    <a href="#" class="btn btn-warning">View More</a>
                                </div>
                            </div>
                        </div>
                    -->

                    </div>

                </div>
            </div>
        </div>


        <div class="footer">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col">
                    <div class="contact-container">
                        <h5 class="contact-heading text-uppercase" style="font-family: Josefin Sans; color:#fff;">
                            Contact</h5>
                        <p class="contact-details">
                            <i class="fas fa-home mr-3"></i> Dhanmondhi 32, Dhaka-1209, Bangladesh.<br>
                            <i class="fas fa-envelope mr-3"></i> info.shoppifybd@gmail.com<br>
                            <i class="fas fa-phone mr-3"></i> 01799064999
                        </p>
                    </div>

                </div>
                <!--Grid column-->
                <div class="col">

                    <p style="color: #ffff; font-family: Josefin Sans; padding-top:90px;">
                        Copyright © 2023 Shoppify BD. All rights reserved
                    </p>
                </div>
                <!--Grid column-->
                <div class="col">
                    <h5 class="contact-heading text-uppercase" style="font-family: Josefin Sans;color:#fff;">
                        Follow Us</h5>

                    <p><a href="https://www.facebook.com/Apurboroy.cse" target="_blank" style="color: #ffff;"><i
                                class="fab fa-facebook-f fa-lg mr-3 p-3"></i></a>
                        <a href="https://github.com/Apurbo-Roy" target="_blank" style="color: #ffff;"><i
                                class="fa-brands fa-github fa-lg mr-3 p-3"></i></a>
                        <a href="https://www.linkedin.com/in/apurboroy/" target="_blank" style="color: #ffff;"><i
                                class="fa-brands fa-linkedin fa-lg mr-3 p-3"></i></a>
                    </p>

                </div>
            </div>

        </div>

    </div>

</body>
</html>