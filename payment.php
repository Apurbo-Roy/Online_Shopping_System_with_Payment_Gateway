<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['cart_items']) || empty($_SESSION['cart_items'])) {
    echo "<h2 class='text-center text-warning'>Your Cart is Empty</h2>";
    exit();
}

$cart_items = $_SESSION['cart_items'];
$total_price = $_SESSION['total_price'];

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
    <title>Payment</title>
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


    <!--================== Navbar=================--->
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
        <nav class="navbar navbar-expand-lg bg-body-light">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="padding-right: 10px;">
                <li class="nav-item">
                    <a class="nav-link" href="#" style="padding-right: 15px; "><i class="fa-solid fa-user"><span
                                class="usacc">
                                <p1 style="font-size: 18px; padding-left: 5px; font-family: Josefin Sans, sans-serif;">
                                    Profile</p1>
                            </span></i></a>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-outline-danger"
                        style="--bs-btn-padding-y: .35rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><a
                            href="logout.php" style="color: white; text-decoration: none;">Log
                            Out</a></button>
                </li>

            </ul>

        </nav>
        <div class="bg-white p-0">
            <div class="text1">
                <h2 class="text-center"
                    style="font-family: Josefin Sans, sans-serif; padding-top: 15px; margin-bottom: 20px;">
                    <span style="color:#003E54;">Payment Page</span>
                </h2>
            </div>
            <div class="container">
                <div class="row">


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
                            <tr>
                                <td colspan="4"><strong>Sub-Total:</strong></td>
                                <td><?php echo $total_price; ?>/-</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content">
                        <a href="index.php"><button type="button" class="btn btn-outline-warning mx-3"
                                style="margin-bottom: 150px;">Continue
                                Shopping</button></a>
                        <a href="checkout.php"><button type="button" class="btn btn-outline-success mx-3"
                                style="margin-bottom: 150px;">Proceed to
                                Checkout</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer"
            style="position: fixed; left: 0;bottom: 0;width: 100%;background-color: #003e54; text-align: center;">
            <p style="color: #ffff;">
                Copyright © 2023 Shoppify BD. All rights reserved
            </p>
        </div>
    </div>
</body>
</html>