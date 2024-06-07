<?php

include ('./database.php');

function getproducts()
{
    global $conn;

    if (!isset($_GET['catagory'])) {
        $select_query = "select * from `product` order by rand() ";
        $result_query = mysqli_query($conn, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $proid = $row['pro_id'];
            $protitle = $row['pro_title'];
            $prodes = $row['pro_des'];
            $proimg1 = $row['img1'];
            $product_price = $row['price'];
            $pro_catid = $row['category_id'];
            echo "
                            <div class='col-md-3 mb-2 '>
                            <div class='card'>
                                <img src='./pro_img/$proimg1' class='card-img-top' alt='$protitle'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$protitle</h5>
                                     <h5 class='card-title'>Price: $product_price BDT.</h5>
                                    <a href='index.php?add_to_cart=$proid' class='btn btn-info'>Add to cart</a>
                                    <a href='product_details.php?pro_id=$proid' class='btn btn-warning'>View More</a>
                                </div>
                            </div>
                        </div>";

        }

    }

}

//get unique category_____----------------------------------------

function get_uni_categories()
{
    global $conn;

    if (isset($_GET['catagory'])) {
        $category_id = $_GET['catagory'];
        $select_query = "select * from `product` where category_id=$category_id";
        $result_query = mysqli_query($conn, $select_query);
        $number_of_rows = mysqli_num_rows($result_query);
        if ($number_of_rows == 0) {
            echo "<h2 style='text-align: center; padding-top:200px; font-family:Josefin Sans, sans-serif; color:#ff0062'>There is no item available for this Category</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $proid = $row['pro_id'];
            $protitle = $row['pro_title'];
            $prodes = $row['pro_des'];
            $proimg1 = $row['img1'];
            $product_price = $row['price'];
            $pro_catid = $row['category_id'];
            echo "
                            <div class='col-md-3 mb-2 '>
                            <div class='card'>
                                <img src='./pro_img/$proimg1' class='card-img-top' alt='$protitle'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$protitle</h5>
                                    <h5 class='card-title'>Price: $product_price BDT.</h5>
                                    <a href='index.php?add_to_cart=$proid' class='btn btn-info'>Add to cart</a>
                                    <a href='product_details.php?pro_id=$proid' class='btn btn-warning'>View More</a>
                                </div>
                            </div>
                        </div>";

        }

    }
}


function getcategory()
{
    global $conn;
    $select_cat = "Select * from `category`";
    $result_cat = mysqli_query($conn, $select_cat);

    while ($row_data = mysqli_fetch_assoc($result_cat)) {
        $category_name = $row_data['category_name'];
        $category_id = $row_data['category_id'];
        echo " <li class='nav-item'>
                            <a href='index.php?catagory=$category_id' class='btn'>
                                <p>$category_name</p>
                            </a>
                        </li>";

    }
}


//-----------------searching data-------------------

function searchpro()
{
    global $conn;

    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "select * from `product` where pro_key like '%$search_data_value%'";
        $result_query = mysqli_query($conn, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 style='text-align: center; padding-top:200px; font-family:Josefin Sans, sans-serif; color:#ff0062'>There is no item available for this Category</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $proid = $row['pro_id'];
            $protitle = $row['pro_title'];
            $prodes = $row['pro_des'];
            $proimg1 = $row['img1'];
            $product_price = $row['price'];
            $pro_catid = $row['category_id'];
            echo "
                            <div class='col-md-3 mb-2 '>
                            <div class='card'>
                                <img src='./pro_img/$proimg1' class='card-img-top' alt='$protitle'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$protitle</h5>
                                     <h5 class='card-title'>Price: $product_price BDT.</h5>
                                    <a href='index.php?add_to_cart=$proid' class='btn btn-info'>Add to cart</a>
                                    <a href='product_details.php?pro_id=$proid' class='btn btn-warning'>View More</a>
                                </div>
                            </div>
                        </div>";

        }

    }
}

function viewmore()
{
    global $conn;
    if (isset($_GET['pro_id'])) {
        if (!isset($_GET['catagory'])) {
            $pro_id = $_GET['pro_id'];
            $select_query = "select * from `product` where pro_id=$pro_id";
            $result_query = mysqli_query($conn, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $proid = $row['pro_id'];
                $protitle = $row['pro_title'];
                $prodes = $row['pro_des'];
                $proimg1 = $row['img1'];
                $proimg2 = $row['img'];
                $product_price = $row['price'];
                $pro_catid = $row['category_id'];
                echo "
                            <div class='col-md-3 mb-2 '>
                            <div class='card'>
                                <img src='./pro_img/$proimg1' class='card-img-top' alt='$protitle'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$protitle</h5>
                                    
                                    <a href='index.php?add_to_cart=$proid' class='btn btn-info'>Add to cart</a>
                                    
                                </div>
                            </div>
                        </div>
                        <div class='col-md-3'>
                         
                            <div class='row'>
                                <div class='col-md-12'>
                                    <h4 class='text text-warning mb-5'
                                        style='text-align: right; padding-left:40px; font-family:Josefin Sans, sans-serif;'>
                                        More Details
                                    </h4>
                                </div>
                                <div class='col-md-12'>
                                    <img src='./pro_img/$proimg2' class='card-img-top' alt='$protitle'>
                                    <p class='card-text' style='color: black; '>$prodes</p>
                                    <p class='card-text' style='color: black; font-size: 25px;'>Price: $product_price BDT.</p>
                                </div>
                            </div>
                        </div> ";

            }


        }
    }
}

// get ip address of product................
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

//cart function.......................................
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $conn;
        $ip = getIPAddress();
        $id = $_SESSION["user"];
        $get_pro_id = $_GET['add_to_cart'];
        $select_query = "select * from `card` where user_id='$id' and pro_id=$get_pro_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already in your cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $id = $_SESSION["user"];
            $insert_query = "insert into `card` (pro_id,user_id,quantity) values ($get_pro_id,$id,1)";
            $result_query = mysqli_query($conn, $insert_query);
            echo "<script>alert('Item is added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

function cartitem()
{
    if (isset($_GET['add_to_cart'])) {
        global $conn;
        $ip = getIPAddress();
        $id = $_SESSION["user"];
        $select_query = "select * from `card` where user_id='$id'";
        $result_query = mysqli_query($conn, $select_query);
        $count_item = mysqli_num_rows($result_query);

    } else {
        global $conn;
        $ip = getIPAddress();
        $id = $_SESSION["user"];
        $select_query = "select * from `card` where user_id='$id'";
        $result_query = mysqli_query($conn, $select_query);
        $count_item = mysqli_num_rows($result_query);
    }
    echo $count_item;
}
function total_price()
{
    global $conn;
    $ip = getIPAddress();
    $id = $_SESSION["user"];
    $total = 0;
    $cart_query = "select * from `card` where user_id='$id'";
    $result = mysqli_query($conn, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['pro_id'];
        $select_product = "select * from `product` where pro_id='$product_id'";
        $result_product = mysqli_query($conn, $select_product);
        while ($row_product_price = mysqli_fetch_array($result_product)) {
            $product_price = array($row_product_price['price']);
            $product_value = array_sum($product_price);
            $total += $product_value;
        }
    }
    echo $total;
}


?>