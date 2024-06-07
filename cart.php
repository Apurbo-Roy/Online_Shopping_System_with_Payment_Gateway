<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>
<?php
include ('database.php');
include ('functions/function.php');
//include ('functions/function.js');
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
    <title>Cart</title>
</head>
<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <!--<script src="functions/function.js"></script> -->
    <style>
    .cart_img {
        width: 60px;
        height: 60px;
        object-fit: contain;
    }
    </style>

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
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                                    <?php cartitem(); ?>
                                </sup></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="ship.php"><i class="fa-solid fa-truck"></i></a>
                        </li>
                    </ul>
                    <form class="d-flex" action="searchpro.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-warning" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!--calling cart----->
        <?php
        cart();
        ?>

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


            <div class="text1">
                <h2 style="font-family: Josefin Sans, sans-serif;padding-top: 15px; margin-bottom: 20px;"
                    class="text-center">
                    <span style="color:#003E54;">My Cart Items</span>
                </h2>
            </div>

            <!---=============products formate======--->
            <div class="container">
                <div class="row">
                    <form action="" method="post">
                        <table class="table table-bordered text-center">
                            <?php
                                global $conn;
                                $ip = getIPAddress();
                                $id = $_SESSION["user"];
                                $total = 0;

                                $cart_query = "SELECT * FROM `card` WHERE user_id='$id'";
                                $result = mysqli_query($conn, $cart_query);
                                $result_count = mysqli_num_rows($result);
                            if ($result_count > 0) {
                                echo "<thead>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan = '2'>Operations</th>
                            </thead>
                            <tbody>";

                                while ($row = mysqli_fetch_array($result)) {
                                    $product_id = $row['pro_id'];
                                    $product_quantity = $row['quantity'];
                                    $select_product = "SELECT * FROM `product` WHERE pro_id='$product_id'";
                                    $result_product = mysqli_query($conn, $select_product);
                                    while ($row_product_price = mysqli_fetch_array($result_product)) {
                                        $product_price = array($row_product_price['price']);
                                        $price_table = $row_product_price['price'];
                                        $product_title = $row_product_price['pro_title'];
                                        $product_image1 = $row_product_price['img1'];
                                        $product_value = array_sum($product_price);
                                        $product_id_value = $row_product_price['pro_id'];
                                        $price_table *= $product_quantity;
                                        $total += $price_table;
                                        ?>
                            <tr>
                                <td><?php echo $product_title ?></td>
                                <td><img src="./pro_img/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                                <td>
                                    <div class="input-group mt-3">
                                        <input name="<?= $product_id_value ?>" id="<?= $product_id_value ?>" type="text"
                                            value="<?= $product_quantity ?>"
                                            class="border border-info text-center rounded mx-auto w-25">
                                    </div>
                                </td>
                                <td><?php echo $price_table ?>/-
                                </td>
                                <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>">
                                </td>
                                <td>
                                    <input type="submit" value="Update" class="btn btn-outline-success mx-2"
                                        name="update_cart">
                                    <input type="submit" value="Remove" class="btn btn-outline-danger mx-2"
                                        name="remove_cart">
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                            } else {
                                echo "<h2 class='text-center text-warning' >Your Cart is Empty</h2>";
                            }
                            ?>
                            <?php
                            if ($result_count > 0) {
                                echo "
                                <tr>
                                    <td><h4><strong>Sub-Total: </strong></h4></td>
                                    <td></td>
                                    <td></td>
                                    <td>$total /-</td>
                                    <td></td>
                                    <td></td>
                                </tr>";
                            }
                            ?>
                        </table>
                        <div class="d-flex">
                            <?php
                            global $conn;
                            $ip = getIPAddress();
                            $id = $_SESSION["user"];
                            $cart_query = "SELECT * FROM `card` WHERE user_id='$id'";
                            $result = mysqli_query($conn, $cart_query);
                            $result_count = mysqli_num_rows($result);
                            if ($result_count > 0) {
                                echo "
                                <a href='index.php'><button type='button' class='btn btn-outline-warning mx-3'
                                    style='margin-bottom: 40px;'>Continue Shopping</button></a>
                                <a href='payment.php'><button type='button' class='btn btn-outline-success mx-3'
                                    style='margin-bottom: 150px;'>Check Out</button></a>";
                            } else {
                                echo "<a href='index.php'><button type='button' class='btn btn-outline-warning mx-3'
                                    style='margin-bottom: 150px;'>Continue Shopping</button></a>";
                            }
                            ?>
                        </div>

                </div>
            </div>
        </div>
        </form>
        <!-- --------------Remove Item ---------------- -->
        <?php
        function update_cart_item(): void
        {
            global $conn;
            $id = $_SESSION["user"];
            if (isset($_POST['update_cart'])) {
                foreach ($_POST as $key => $value) {
                    if (is_numeric($key)) {
                        $quantity = (int)$value;
                        $update_cart = "UPDATE `card` SET quantity = $quantity WHERE pro_id = $key AND user_id = $id";
                        mysqli_query($conn, $update_cart);
                    }
                }
                echo "<script>window.open('cart.php', '_self')</script>";
            }
        }

        function remove_cart_item(): void
        {
            global $conn;
            $id = $_SESSION["user"];
            if (isset($_POST['remove_cart'])) {
                if (is_array($_POST['removeitem'])) {
                    foreach ($_POST['removeitem'] as $remove_id) {
                        $delete_query = "DELETE FROM `card` WHERE pro_id = $remove_id AND user_id = $id";
                        mysqli_query($conn, $delete_query);
                    }
                    echo "<script>window.open('cart.php', '_self')</script>";
                }
            }
        }

        update_cart_item();
        remove_cart_item();
        ?>
        <div class="footer2">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col">
                    <div class="contact-container">
                        <h5 class="contact-heading text-uppercase" style="font-family: Josefin Sans;color:#fff;">Contact
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
        <?php
    // Store cart items in session
    $_SESSION['cart_items'] = array();
    $_SESSION['total_price'] = $total;

    $result = mysqli_query($conn, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['pro_id'];
        $product_quantity = $row['quantity'];
        $select_product = "SELECT * FROM `product` WHERE pro_id='$product_id'";
        $result_product = mysqli_query($conn, $select_product);
        while ($row_product = mysqli_fetch_array($result_product)) {
            $product_title = $row_product['pro_title'];
            $product_price = $row_product['price'];
            $product_image = $row_product['img1'];

            $_SESSION['cart_items'][] = array(
                'title' => $product_title,
                'price' => $product_price,
                'quantity' => $product_quantity,
                'image' => $product_image
            );
        }
    }
    ?>
</body>
</html>