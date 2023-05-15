<?php

$server_name = "localhost";
$server_username = "root";
$server_password = "";
$database_name = "hospitalfinder";

$connection = new mysqli($server_name, $server_username, $server_password, $database_name, "3307");

$email = "";
$password = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST["email"];
    $password = $_POST["password"];

    do {
        if (empty($email) || empty($password)) {
            $errorMessage = "All the fields are required";
            break;
        }

        //REG DONE

        $sql = "SELECT * FROM `user` WHERE user.email='$email' & user.password='$password' ";
        $result = $connection->query($sql);


        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }
        $email = "";
        $password = "";
        $successMessage = "login Successful";
    } while (0);
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="keywords" content="HOSPITAL,Hospital Finder,HOSPITAL WEBSITE, MEDICAN">
    <meta name="description" content="india's best hospital website of indian">
    <meta name="author" content="loginpage">
    <title>Hospital finder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <link rel="stylesheet" type="text/css" href="css/animate.css">

</head>

<body>
    <!-- Start Header Coding-->
    <header class="mx-auto">
        <div class="menu ">
            <!-- Start Brand name coding-->
            <div class="brand-name">
                <a href="./index.html">
                    <h2 class="animated flash my-2">
                        <i class="fa fa-hospital"></i>&nbsp;
                        Hospital finder
                    </h2>
                </a>
            </div>
            <!-- End Brand name coding-->
            <!-- Start Nav coding & menu coding -->
            <nav class="">
                <ul class="li-list">
                    <li><a href="./index.html">Home</a></li>
                    <li><a href="./reg.html">Register</a></li>
                    <li><a href="./login.html">Login</a></li>
                    <li><a href="./district-list.html">District List</a></li>

                </ul>
            </nav>
            <!-- End Nav coding & menu coding -->
        </div>
    </header>
    <!-- End Header Coding-->
    <!-- Start Section Coding-->
    <section>
        <div class="w-80">
            <div class="form-box">
                <h1>Login Page for registered hospitals</h1>
                <hr>
                <form method="post">


                    <label for="email"><b>email :</b></label><br />
                    <input type="text" name="email" id="email" />
                    <br /><br />

                    <label for="password"><b>Password :</b></label>
                    <br />
                    <input type="password" name="password" id="password" />
                    <br /><br />

                    <button type="submit" id="login-btn">Login</button>
                    <button><a href="./reg.html">Register New User</a></button>
                    <br /><br />
                    <p>Forget Password ? <a href="./reg.html">Click Here</a></p>
                </form>
            </div>
        </div>
        </div>
    </section>
    <!-- End Section Coding-->
    <!-- Start Footer Coding-->
    <footer>
        <div class="footer-box">
            <a href="#">All Reserved by Mursalin Software company</a>
        </div>
        </div>
    </footer>
    <!-- End footer Coding-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>