<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <link rel="stylesheet" href="design.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap">
    <h1 style="font-family: Josefin Sans, sans-serif;
  color: #05433e;text-align: center; padding-top: 70px;">Admin Login </h1>
</head>
<body>
    <div class="container">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <div class="form_wrapper">
            <div class="form_container">



                <?php
                if (isset($_POST["login"])) {
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    $keynum = $_POST["keynum"];
                    require_once "database.php";
                    $sql = "SELECT * FROM admin WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if ($user) {
                        if (password_verify($password, $user["password"])) {
                            session_start();
                            $_SESSION["user"] = "yes";
                            header("Location: admin.php");
                            die();
                        } else {
                            echo "<div class='alert alert-danger'>Password does not match</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Email does not match</div>";
                    }
                }
                ?>



                <form action="adminlog.php" method="post">
                    <div class="row clearfix">
                        <div class="">


                            <div class="form-group">
                                <span><i aria-hidden="true" class="fa-solid fa-key"></i></span>
                                <input type="text" class="form-control" name="email" placeholder="Email:">
                            </div>
                            <div class="row clearfix">
                                <div class="col_half">
                                    <div class="form-group">
                                        <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Password" />
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <span><i aria-hidden="true" class="fa-solid fa-key"></i></span>
                                <input type="text" class="form-control" name="keynum" placeholder="Key Number:">
                            </div>
                            <div class="form-btn">
                                <input type="submit" value="Login" name="login" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
                <div>
                    <p>Not registered yet <a href="admin-reg.php">Register Here</a></p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>