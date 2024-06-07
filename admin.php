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
    <title>Admin Dashboard</title>
</head>
<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-body-white">
            <div class="container-fluid">
                <img src="https://i.ibb.co/c13hdHP/Shoppify-bd-white.png" alt="Shoppify-bd-white" height="65px">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="padding-right: 50px;">
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="padding-right: 15px; "><i class="fa-solid fa-user"><span
                                    class="usacc">
                                    <p1
                                        style="font-size: 18px; padding-left: 5px; font-family: Josefin Sans, sans-serif;">
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
            </div>
        </nav>

        <div class="bg-white">
            <P style="font-family: Josefin Sans, sans-serif; font-size:25px; color:#003e54">
                Welcome to Admin Panel of Shopphify <span style="color:#F6AE36">BD.</span>
            </p>

            <div class="button text-center" style="padding-top:50px">
                <button type="button" class="btn btn-outline-warning"
                    style="--bs-btn-padding-y: .35rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                    <a href="admin.php?insertcat"
                        style="color: #003e54; text-decoration: none; font-family: Josefin Sans, sans-serif;">Insert
                        Category</a>

                </button>

                <button type="button" class="btn btn-outline-warning"
                    style="--bs-btn-padding-y: .35rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><a
                        href="#"
                        style="color: #003e54; text-decoration: none;font-family: Josefin Sans, sans-serif;">View
                        Category</a>
                </button>

                <button type="button" class="btn btn-outline-warning"
                    style="--bs-btn-padding-y: .35rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><a
                        href="product.php"
                        style="color: #003e54; text-decoration: none;font-family: Josefin Sans, sans-serif;">Insert
                        Product</a>
                </button>
                <button type="button" class="btn btn-outline-warning"
                    style="--bs-btn-padding-y: .35rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><a
                        href="logout.php"
                        style="color: #003e54; text-decoration: none;font-family: Josefin Sans, sans-serif;">View
                        Product</a>
                </button>
                <button type="button" class="btn btn-outline-warning"
                    style="--bs-btn-padding-y: .35rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><a
                        href="logout.php"
                        style="color: #003e54; text-decoration: none;font-family: Josefin Sans, sans-serif;">All
                        Orders</a>
                </button>
                <button type="button" class="btn btn-outline-warning"
                    style="--bs-btn-padding-y: .35rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><a
                        href="logout.php"
                        style="color: #003e54; text-decoration: none;font-family: Josefin Sans, sans-serif;">All
                        Payments</a>
                </button>


            </div>

            <div class="bg-white">
                <!--==================insert cat=========--->
                <div class="container my-5">
                    <?php
                    if (isset($_GET['insertcat'])) {
                        include ('insertcat.php');
                    }
                    ?>
                </div>
            </div>
        </div>





        <!--========================footer==========
       --->

    </div>


</body>
</html>