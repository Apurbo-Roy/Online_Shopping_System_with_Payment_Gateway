<html>

<head>
    <link rel="stylesheet" href="design.css" />

</head>

<body>
    <div class="container">

        <form action="registration.php" method="post">

            <script src="https://kit.fontawesome.com/f7aa0ce1b3.js" crossorigin="anonymous"></script>
            <div class="form_wrapper">
                <div class="form_container">



                    <?php
                    if (isset($_POST["submit"])) {
                        $fullName = $_POST["fullname"];
                        $phnnumber = $_POST["phnnumber"];
                        $email = $_POST["email"];
                        $password = $_POST["password"];


                        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                        $errors = array();

                        if (empty($fullName) or empty($phnnumber) or empty($email) or empty($password)) {
                            array_push($errors, "All fields are required");
                        }
                        if (is_numeric($phnnumber) == false) {
                            array_push($errors, "Phone number must be required");
                        }
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            array_push($errors, "Please enter a valid Email");
                        }
                        if (strlen($password) < 8) {
                            array_push($errors, "Password must be at least 8 charactes long");
                        }

                        require_once "database.php";
                        $sql = "SELECT * FROM users WHERE email = '$email'";
                        $result = mysqli_query($conn, $sql);
                        $rowCount = mysqli_num_rows($result);
                        if ($rowCount > 0) {
                            array_push($errors, "Email already exists!");
                        }
                        if (count($errors) > 0) {
                            foreach ($errors as $error) {
                                echo "<div class='alert alert-danger'>$error</div>";
                            }
                        } else {

                            $sql = "INSERT INTO users (full_name, phn_number, email, password) VALUES ( ?, ?, ?, ? )";
                            $stmt = mysqli_stmt_init($conn);
                            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                            if ($prepareStmt) {
                                mysqli_stmt_bind_param($stmt, "siss", $fullName, $phnnumber, $email, $passwordHash);
                                mysqli_stmt_execute($stmt);
                                echo "<div class='alert alert-success'>You are registered successfully.</div>";
                            } else {
                                die("Something went wrong");
                            }
                        }
                    }

                    if (isset($_POST["submit1"])) {
                        header("Location: login.php");
                        die();
                    }

                    ?>


                    <div class="title_container">
                        <h2>Welcome To Our Family</h2>
                    </div>
                    <div class="row clearfix">
                        <div class="">

                            <div class="form-group">
                                <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
                            </div>
                            <div class="form-group">
                                <span><i aria-hidden="true" class="fa fa-phone-alt"></i></span>
                                <input type="text" class="form-control" name="phnnumber" placeholder="Phone Number:" />
                            </div>
                            <div class="form-group">
                                <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control" name="email" placeholder="Email:">
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
                                <input type="submit" value="Register" name="submit" />
                            </div>

                        </div>
                    </div>
                </div>
                <p style="color:#fc4765;">Already have a Account? <a href=" login.php">Login</a>
                </p>

            </div>




        </form>
        <div class="signin">
            <a href="admin-reg.php">
                <input type="submit1" value="Register as a Admin" name="submit1" />
            </a>

        </div>
    </div>

</body>

</html>