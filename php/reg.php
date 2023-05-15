<?php

$server_name = "localhost";
$server_username = "root";
$server_password = "";
$database_name = "hospitalfinder";

$connection = new mysqli($server_name, $server_username, $server_password, $database_name, "3307");

$name = "";
$email = "";
$mobile = "";
$hospital_name = "";
$address = "";
$password = "";
$rePassword = "";
$district = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $mobile = $_POST["mobile"];
  $hospital_name = $_POST["hospital_name"];
  $address = $_POST["address"];
  $password = $_POST["password"];
  $district = $_POST["district"];
  $rePassword = $_POST["rePassword"];

  do {
    if (empty($name) || empty($email) || empty($mobile) || empty($hospital_name) || empty($address) || empty($password) || empty($district) || empty($rePassword)) {
      $errorMessage = "All the fields are required";
      break;
    }
    if ($password != $rePassword) {
      $errorMessage = "Passwords dosen't matched";
      break;
    }


    //REG DONE

    $sql = "INSERT INTO user VALUES ('$name','$email','$password',1,'$hospital_name','$address','$mobile','$district')";
    $result = $connection->query($sql);


    if (!$result) {
      $errorMessage = "Invalid query: " . $connection->error;
      break;
    }

    $name = "";
    $email = "";
    $mobile = "";
    $hospital_name = "";
    $address = "";
    $password = "";
    $rePassword = "";
    $district = "";
    $successMessage = "Registration Successful";
  } while (0);
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="keywords" content="HOSPITAL,Hospital Finder,HOSPITAL WEBSITE, MEDICAN" />
  <meta name="description" content="india's best hospital website of indian" />
  <meta name="author" content="registerpage" />
  <title>Hospital finder</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/fontawesome/css/all.css" />
  <link rel="stylesheet" type="text/css" href="css/animate.css" />
</head>

<body>
  <!-- Start Header Coding-->
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
        <h1>User registration form </h1>
        <hr />
        <form method="post">

          <label for="name"><b>Author's Name :</label><br />
          <input type="text" name="name" id="name" value="<?php echo $name ?>" />
          <br /><br />

          <label for="email"><b>Email :</label><br />
          <input type="email" name="email" id="email" value="<?php echo $email ?>" />
          <br /><br />

          <label for="mobile"><b>Mobile :</label><br />
          <input type="number" name="mobile" id="mobile" value="<?php echo $mobile ?>" />
          <br /><br />

          <label for="hospital_name"><b>Hospital Name :</label><br />
          <input type="text" name="hospital_name" id="hospital_name" value="<?php echo $hospital_name ?>" />
          <br /><br />

          <label for="address"><b> Address : </label><br />
          <input type="text" name="address" id="address" value="<?php echo $address ?>" />
          <br /><br />


          <label for="district"><b> District : </label><br />
          <input type="text" name="district" id="district" value="<?php echo $district ?>" />
          <br /><br />

          <label for="password"><b>Password :</label>
          <br />
          <input type="password" name="password" id="password" value="<?php echo $password ?>" />
          <br /><br />

          <label for="rePassword"><b>Confirm Password :</label>
          <br />
          <input type="password" name="rePassword" id="rePassword" value="<?php echo $rePassword ?>" />
          <br /><br />

          <button type="submit" id="register-btn">Submit</button>
        </form>
      </div>
    </div>
  </section>
  <!-- End Section Coding-->
  <!-- Start Footer Coding-->
  <footer>
    <div class="w-80">
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