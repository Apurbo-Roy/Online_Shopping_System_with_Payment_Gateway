<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ship.php");
    exit();
}

$cart_items = $_SESSION['cart_items'];
$total_price = $_SESSION['total_price'];
$payment_status = $_SESSION['payment_status'];

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
    <title>Shipment Page</title>
</head>
<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <style>
    .cart_img {
        width: 60px;
        height: 60px;
        object-fit: contain;
    }
    </style>

    <div class="container-fluid p-0">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg bg-body-light">
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


            <div class="text1">
                <h2 class="text-center"
                    style="font-family: Josefin Sans, sans-serif; padding-top: 15px; margin-bottom: 20px;">
                    <span style="color:#003E54;">Shipment Details</span>

                </h2>
            </div>
            <div class="container">
                <div class="row">
                    <h2 style="font-family: Josefin Sans, sans-serif; padding-top: 15px; margin-bottom: 20px;">Order
                        Details:</h2>
                    <table class="table table-bordered text-center">

                        <thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cart_items as $item): ?>
                            <tr>
                                <td><?php echo $item['title']; ?></td>
                                <td><img src="./pro_img/<?php echo $item['image']; ?>" alt="" class="cart_img"></td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td><?php echo $item['price']; ?>/-</td>
                                <td><?php echo $item['price'] * $item['quantity']; ?>/-</td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                    <p>Total Amount: <?php echo $total_price; ?> BDT</p>
                    <p>Payment Status: <?php echo $payment_status; ?></p>
                </div>
            </div class="msg">
            <h3
                style="font-family: Josefin Sans, sans-serif;font-size:20px; padding-top: 15px; margin-bottom: 50px; text-align: center;">
                Thanks For
                shopping
                From Shoppify BD<span style='font-size:20px;margin-bottom: 50px;'>&#128519;</span> </h3>
            <div></div>
        </div>


    </div>
    <div class="footer">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col">
                <div class="contact-container">
                    <h5 class="contact-heading text-uppercase" style="font-family: Josefin Sans; color:#fff;">Contact
                    </h5>
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
                <h5 class="contact-heading text-uppercase" style="font-family: Josefin Sans; color:#fff;">
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