<?php
include ('database.php');
if (isset($_POST['insert'])) {
    $catagory = $_POST['cat-titel'];
    $select_query = "Select * from `category` where category_name = '$catagory' ";
    $result_select = mysqli_query($conn, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This Category is already inside the database.')</script>";
    } else {
        $inser_query = "Insert into `category` (category_name) values('$catagory') ";
        $result = mysqli_query($conn, $inser_query);
        if ($result) {
            echo "<script>alert('Category insert Sucessfully.')</script>";
        }
    }

}

?>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-outline-warning" id="basic-addon1"><i
                class="fa-regular fa-rectangle-list"></i></span>
        <input type="text" class="form-control" name="cat-titel" placeholder="Category Titel" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">

        <input type="submit" class="btn btn-outline-warning border-0.5 p-2 my-3" name="insert"
            value="Insert Categories">

        <!---<button class="big-info p-2 my-3 border-0">Insert</button>--->

    </div>
</form>