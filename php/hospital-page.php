<?php

$server_name = "localhost";
$server_username = "root";
$server_password = "";
$database_name = "hospitalfinder";

$connection = new mysqli($server_name, $server_username, $server_password, $database_name, "3307");

$ap_name = "";
$ap_email = "";
$ap_date = "";
$ap_doctor = "";
$ap_msg = "";
$ap_hospital_name = "";

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https://";
else
    $url = "http://";
// Append the host(domain name, ip) to the URL.   
$url .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL   
$url .= $_SERVER['REQUEST_URI'];

$parts = parse_url($url);
parse_str($parts['query'], $query);
$ap_hospital_name =  $query['name'];

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ap_name = $_POST["ap_name"];
    $ap_email = $_POST["ap_email"];
    $ap_date = $_POST["ap_date"];
    $ap_doctor = $_POST["ap_doctor"];
    $ap_msg = $_POST["ap_msg"];

    do {
        if (empty($ap_name) || empty($ap_email) || empty($ap_date) || empty($ap_doctor) || empty($ap_msg)) {
            $errorMessage = "All the fields are required";
            break;
        }


        //REG DONE

        $sql = "INSERT INTO appointment VALUES ('$ap_name','$ap_email','$ap_date','$ap_doctor','$ap_msg','$ap_hospital_name')";
        $result = $connection->query($sql);


        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $ap_name = "";
        $ap_email = "";
        $ap_date = "";
        $ap_doctor = "";
        $ap_msg = "";
        $successMessage = "Registration Successful";
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
    <meta name="author" content="Hospital Finder">
    <title>hospitals | Hospital Finder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Vanilla Datepicker CSS -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker.min.css'>

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



    <section>

        <div class="container mx-auto mt-4 mb-3 d-flex justify-content-between gap-4">
            <div class="">
                <p class="h1">Dhaka Medical College</p>
            </div>
            <div class="">
                <div class="d-flex gap-5 justify-content-between align-items-center">
                    <div>
                        <p style="font-size: medium;">24 hours open </p>
                    </div>
                    <div>
                        <p style="font-size: medium;">+880135566788</p>
                        <p style="font-size: medium;">sher-e-banglamedicalcollege@gmail.com </p>
                    </div>
                    <div>
                        <p style="font-size: medium;">kotwali</p>
                        <p style="font-size: medium;">Barisal Sadar,Barisal </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto mb-3">
            <div class="row gap-1">
                <a href="#home" class="px-5 col nav">Home</a>
                <a href="#about" class="px-5 col nav">About</a>
                <a href="#services" class="px-5 col nav">Services</a>
                <a href="#doctors" class="px-5 col nav">Doctors</a>
                <a href="#make-appintment" class="px-5 col nav">Appointment</a>
                <a href="#contact" class="px-5 col nav">Contact</a>
            </div>
        </div>
    </section>

    <section id="home">
        <img id="cover_img" src="" style="width:100%;">
    </section>


    <section id="about" class="my-5">
        <div class="container mx-auto gap-5 d-flex justify-content-center align-items-center">
            <img id="aboutImages" src="./images/dmc.jpg" style="width: 40%;" class="">
            <div id="aboutDetails" class="w-50">
                <p class="h1 mb-3 fw-bold">About Us</p>
                <p class="h6"></p>
            </div>
        </div>
    </section>


    <section id="services" class="mt-5">
        <div class="container">
            <p class="h1 fw-bold mb-4 text-decoration-underline text-center">Our Services</p>

            <div id="serviceContainer" class="d-flex flex-wrap gap-3 justify-content-center align-items-start">
                <!-- SERVICE WILL BE LOADED HERE -->
                <!-- <div style="width: 24%;">
                    <img src="./images/dmc.jpg" class="rounded shadow w-100 mb-4">
                    <p style="font-size: medium;">For your child whitest teeths</p>
                    <p style="font-size: medium;" class="fw-bold my-2">DENTIST</p>
                    <p style="font-size: medium;">Praesent convallis tortor et enim laoreet, vel consectetur purus
                        latoque penatibus et dis parturient</p>
                </div> -->
            </div>
        </div>
    </section>


    <section id="doctors" class="mt-5">
        <div class="container">
            <p class="h1 fw-bold mb-4 text-decoration-underline text-center">Our Doctors</p>

            <div id="doctorsContainer" class="d-flex flex-wrap gap-3 justify-content-center align-items-start">
                <!-- SERVICE WILL BE LOADED HERE -->
                <!-- <div style="width: 24%;">
                    <img src="./images/dmc.jpg" height="260px" class="rounded shadow w-100 mb-4">
                    <p style="font-size: medium;">For your child whitest teeths</p>
                    <p style="font-size: medium;" class="fw-bold my-2">DENTIST</p>
                    <p style="font-size: medium;">Praesent convallis tortor et enim laoreet, vel consectetur purus
                        latoque penatibus et dis parturient</p>
                </div> -->
            </div>
        </div>
    </section>


    <section id="make-appintment" class="mt-5">
        <div class="container">
            <p class="h1 fw-bold mb-4 text-decoration-underline text-center">Make an appointment</p>
            <form method="post">
                <!-- NAME -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name" name="ap_name"
                        required>
                    <label for="floatingInput">Your Name <span style="color:red">*</span> </label>
                </div>
                <!-- EMAIL -->
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                        name="ap_email" required>
                    <label for="floatingInput">Email address</label>
                </div>

                <!-- CONSULTING DOC -->

                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelectDoc" aria-label="Floating label select example"
                        name="ap_doctor">
                        <option selected>Select Your Doctor</option>
                    </select>
                    <label for="floatingSelectDoc">Doctors</label>
                </div>

                <!-- DATE -->

                <div class="form-floating mb-3 d-flex">
                    <input type="text" class="datepicker_input form-control border-2" id="datepicker1" name="ap_date"
                        required placeholder="DD/MM/YYYY">
                    <label for="datepicker1">Pick Date</label>
                </div>

                <!-- MESSAGE -->
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                        name="ap_msg" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Your Message</label>
                </div>


                <div>
                    <button type="submit" class="btn btn-primary mx-auto">Book Appointment</button>
                </div>
            </form>




        </div>
    </section>

    <section id="contact">
        <div class="container">
            <p class="h1 fw-bold mb-4 text-decoration-underline text-center">Contact</p>
            <div class="gc-2-1 gap-5">
                <div class="">
                    <img id="contact_image" class="w-100" src="" alt="">
                </div>
                <div class="">
                    <div>

                        <div class="d-flex gap-3 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                            </svg>
                            <div class="w-75">
                                <p class="h4">Address</p>
                                <p class="h6">abc</p>
                            </div>
                        </div>

                        <div class="d-flex gap-3 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z" />
                                <path
                                    d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z" />
                            </svg>
                            <div class="w-75">
                                <p class="h4">Email</p>
                                <p class="h6">abc</p>
                            </div>

                        </div>

                        <div class="d-flex gap-3 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                            </svg>
                            <div class="w-75">
                                <p class="h4">Phone</p>
                                <p class="h6">abc</p>
                            </div>
                        </div>

                    </div>

                    <!-- <form>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name" required>
                            <label for="floatingInput">Your Name <span style="color:red">*</span> </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                                required>
                            <label for="floatingInput">Email address</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Your Message</label>
                        </div>


                        <div>
                            <button type="submit" class="btn btn-primary mx-auto">Submit Message</button>
                        </div>
                    </form> -->



                </div>
    </section>



    <footer class="mt-5">
        <div class="footer-box">
            <a href="#">All Reserved by Mursalin Software company</a>
        </div>
        </div>
    </footer>
    <!-- End footer Coding-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/loadHospitalPage.js"></script>


    <!-- Bootstrap 5 JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>

    <!-- Vanilla Datepicker JS -->
    <script src='https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js'></script>
    <script>
        /* Bootstrap 5 JS included */
        /* vanillajs-datepicker 1.1.4 JS included */

        const getDatePickerTitle = elem => {
            // From the label or the aria-label
            const label = elem.nextElementSibling;
            let titleText = '';
            if (label && label.tagName === 'LABEL') {
                titleText = label.textContent;
            } else {
                titleText = elem.getAttribute('aria-label') || '';
            }
            return titleText;
        }

        const elems = document.querySelectorAll('.datepicker_input');
        for (const elem of elems) {
            const datepicker = new Datepicker(elem, {
                'format': 'dd/mm/yyyy', // UK format
                title: getDatePickerTitle(elem)
            });
        }
    </script>

</body>

</html>