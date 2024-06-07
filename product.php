<?php
include ('database.php');
if (isset($_POST['insert_product'])) {
    $product_title = $_POST['protitle'];
    $description = $_POST['description'];
    $keywords = $_POST['keywords'];
    $product_category = $_POST['product_category'];
    $Price = $_POST['Price'];

    $image1 = $_FILES['image1']['name'];
    $image2 = $_FILES['image2']['name'];


    $temp_image1 = $_FILES['image1']['tmp_name'];
    $temp_image2 = $_FILES['image2']['tmp_name'];

    if ($product_title == '' or $description == '' or $keywords == '' or $product_category == '' or $Price == '' or $image1 == '') {
        echo " <script>alert(Please fill all the fields</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./pro_img/$image1");
        move_uploaded_file($temp_image2, "./pro_img/$image2");

        $insert_product = "insert into `product`(pro_title,pro_des,pro_key,category_id,img1,img,price)values('$product_title','$description','$keywords','$product_category','$image1','$image2','$Price')";
        $result_query = mysqli_query($conn, $insert_product);
        if ($result_query) {
            echo " <script>alert('Product Added Successfully.')</script>";
        }
    }
}


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
    <title>Inserting product</title>
</head>
<body class="bg-light">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <div class="container mt-3">
        <h1 style="font-size: 25px; text-align:center;padding-top: 10px; font-family: Josefin Sans, sans-serif;">Insert
            Your Products
        </h1>

        <form action="" method="post" enctype="multipart/form-data">
            <!--=============title========-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="protitle" class="form-label">Product Title
                </label>
                <input type="text" name="protitle" id="protitle" class="form-control" placeholder="Enter Product Title"
                    autocomplete="off" required="required">
            </div>

            <!--=============description========-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product Description
                </label>
                <input type="text" name="description" id="description" class="form-control"
                    placeholder="Enter Product Description" autocomplete="off" required="required">
            </div>

            <!--=============keywords========-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="keywords" class="form-label">Product Keywords
                </label>
                <input type="text" name="keywords" id="keywords" class="form-control"
                    placeholder="Enter Product Keywords" autocomplete="off" required="required">
            </div>

            <!--=============Categories========-->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                    $select_cat = "Select * from `category`";
                    $result_cat = mysqli_query($conn, $select_cat);

                    while ($row_data = mysqli_fetch_assoc($result_cat)) {
                        $category_name = $row_data['category_name'];
                        $category_id = $row_data['category_id'];
                        echo " <option value='$category_id '>$category_name</option>";

                    }
                    ?>

                </select>
            </div>

            <!--=============image1========-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="image1" class="form-label">Product Image 1
                </label>
                <input type="file" name="image1" id="image1" class="form-control" required="required">
            </div>

            <!--=============image2========-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="image2" class="form-label">Product Image 2
                </label>
                <input type="file" name="image2" id="image2" class="form-control">
            </div>

            <!--=============Price========-->
            <div class="div form-outline mb-4 w-50 m-auto">
                <label for="Price" class="form-label">Product Price
                </label>
                <input type="text" name="Price" id="Price" class="form-control" placeholder="Enter Product Price"
                    autocomplete="off" required="required">
            </div>
            <!--=============button========-->
            <div class="div form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-outline-warning mb-3 px-3"
                    style="color: #05433e;" value=" Insert Products">
            </div>
        </form>

    </div>

</body>