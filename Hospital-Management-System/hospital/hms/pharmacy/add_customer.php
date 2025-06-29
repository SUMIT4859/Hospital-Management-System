<?php
session_start();

// Enable error reporting for debugging (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('include/config.php');

// Corrected session check condition
if (!isset($_SESSION['id']) || strlen($_SESSION['id']) == 0) {
    header('location:logout.php');
    exit();
} else {

    if (isset($_POST['submit'])) {
        // Escape user inputs to prevent SQL injection
        $NAME = mysqli_real_escape_string($con, $_POST['NAME']);
        $EMAIL = mysqli_real_escape_string($con, $_POST['EMAIL']);
        $CONTACT_NUMBER = mysqli_real_escape_string($con, $_POST['CONTACT_NUMBER']);
        $DOCTOR_NAME = mysqli_real_escape_string($con, $_POST['DOCTOR_NAME']);
        $DOCTOR_EMAIL = mysqli_real_escape_string($con, $_POST['DOCTOR_EMAIL']);

        // If you intend to store ADDRESS and DOCTOR_ADDRESS, include them in the form and here
        // Example:
        // $ADDRESS = mysqli_real_escape_string($con, $_POST['ADDRESS']);
        // $DOCTOR_ADDRESS = mysqli_real_escape_string($con, $_POST['DOCTOR_ADDRESS']);

        // Updated SQL query to include EMAIL fields instead of ADDRESS
        $sql = mysqli_query($con, "INSERT INTO customers (NAME, EMAIL, CONTACT_NUMBER, DOCTOR_NAME, DOCTOR_EMAIL) VALUES ('$NAME', '$EMAIL', '$CONTACT_NUMBER', '$DOCTOR_NAME', '$DOCTOR_EMAIL')");

        if ($sql) {
            echo "<script>alert('Customer info added successfully');</script>";
            exit();
        } else {
            // Display error message for debugging
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Add Customer</title>
    
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>
<body>
    <div id="app">		
        <?php include('include/sidebar.php'); ?>
        <div class="app-content">
            <?php include('include/header.php'); ?>
            <!-- end: TOP NAVBAR -->
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Pharmacy | Add Customer</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Pharmacy</span>
                                </li>
                                <li class="active">
                                    <span>Add Customer</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->
                    <!-- start: BASIC EXAMPLE -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row margin-top-30">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="panel panel-white">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Add Customer</h5>
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" name="addcust" method="post" onsubmit="return valid();">
                                                    
                                                    <style>
                                                        .required::after {
                                                            content: ' *';
                                                            color: red;
                                                        }
                                                    </style>	

                                                    <div class="form-group">
                                                        <label for="name" class="required">Customer Name</label>
                                                        <input type="text" name="NAME" id="name" class="form-control" placeholder="Enter Customer Name" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="email" class="required">Customer Email</label>
                                                        <input type="email" name="EMAIL" id="email" class="form-control" placeholder="Enter Customer Email" required onBlur="checkEmailAvailability()">
                                                        <span id="email-availability-status"></span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="contact_number" class="required">Customer Contact No</label>
                                                        <input type="text" name="CONTACT_NUMBER" id="contact_number" class="form-control" placeholder="Enter Customer Contact Number" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="doctor_name" class="required">Doctor Name</label>
                                                        <input type="text" name="DOCTOR_NAME" id="doctor_name" class="form-control" placeholder="Enter Doctor Name" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="doctor_email" class="required">Doctor Email</label>
                                                        <input type="email" name="DOCTOR_EMAIL" id="doctor_email" class="form-control" placeholder="Enter Doctor Email" required onBlur="checkEmailAvailability()">
                                                        <span id="doctor-email-availability-status"></span>
                                                    </div>
                                                    
                                                    <!-- If ADDRESS and DOCTOR_ADDRESS are needed, include them here -->
                                                    <!--
                                                    <div class="form-group">
                                                        <label for="address" class="required">Customer Address</label>
                                                        <textarea name="ADDRESS" id="address" class="form-control" placeholder="Enter Customer Address" required></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="doctor_address" class="required">Doctor Address</label>
                                                        <textarea name="DOCTOR_ADDRESS" id="doctor_address" class="form-control" placeholder="Enter Doctor Address" required></textarea>
                                                    </div>
                                                    -->

                                                    <button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
                                                        Submit
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Additional content can go here -->
                            </div>
                        </div>
                    </div>
                    <!-- end: BASIC EXAMPLE -->
                </div>
            </div>
        </div>
        <!-- start: FOOTER -->
        <?php include('include/footer.php'); ?>
        <!-- end: FOOTER -->
        
        <!-- start: SETTINGS -->
        <?php include('include/setting.php'); ?>
        <!-- end: SETTINGS -->
    </div>
    <!-- start: MAIN JAVASCRIPTS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
    <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="vendor/autosize/autosize.min.js"></script>
    <script src="vendor/selectFx/classie.js"></script>
    <script src="vendor/selectFx/selectFx.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CLIP-TWO JAVASCRIPTS -->
    <script src="assets/js/main.js"></script>
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets/js/form-elements.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
        });

        // Example: Define the valid() function if validation is needed
        function valid() {
            // Perform custom validation if necessary
            return true;
        }

        // Example: Define checkEmailAvailability() if using AJAX for email validation
        function checkEmailAvailability() {
            var email = $('#email').val();
            if(email != "") {
                $.ajax({
                    url: "check_availability.php",
                    method: "POST",
                    data: {email: email},
                    success: function(data) {
                        $("#email-availability-status").html(data);
                    }
                });
            } else {
                $("#email-availability-status").html("");
            }
        }

        function checkDoctorEmailAvailability() {
            var doctor_email = $('#doctor_email').val();
            if(doctor_email != "") {
                $.ajax({
                    url: "check_doctor_email_availability.php",
                    method: "POST",
                    data: {doctor_email: doctor_email},
                    success: function(data) {
                        $("#doctor-email-availability-status").html(data);
                    }
                });
            } else {
                $("#doctor-email-availability-status").html("");
            }
        }

        // Attach the correct function to the doctor's email field
        $('#doctor_email').on('blur', function() {
            checkDoctorEmailAvailability();
        });
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>
</html>
