<?php
session_start();

// Enable error reporting for debugging (Disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('include/config.php');

// Corrected session check condition
if(strlen($_SESSION['id']) == 0) {
    header('location:logout.php');
    exit(); // Ensure the script stops after redirection
} else {

    date_default_timezone_set('Asia/Kolkata'); // Set the default timezone
    $currentTime = date('d-m-Y h:i:s A', time());

    if(isset($_POST['submit'])) {
        // Sanitize user inputs to prevent SQL injection
        $cpass = mysqli_real_escape_string($con, $_POST['cpass']);
        $npass = mysqli_real_escape_string($con, $_POST['npass']);
        $cfpass = mysqli_real_escape_string($con, $_POST['cfpass']);
        
        $docEmail = $_SESSION['dlogin']; // Corrected to match login session variable

        // Hash the current password for comparison
        $hashed_cpass = md5($cpass);

        // Prepare statement to prevent SQL injection
        $stmt = $con->prepare("SELECT password FROM doctors WHERE docEmail = ? AND password = ?");
        $stmt->bind_param("ss", $docEmail, $hashed_cpass);
        $stmt->execute();
        $stmt->store_result();
        
        $num = $stmt->num_rows;
        $stmt->close();

        if($num > 0) {
            // Ensure new password and confirm password match
            if($npass === $cfpass) {
                // Hash the new password
                $hashed_npass = md5($npass);

                // Update the password in the database using prepared statements
                $update_stmt = $con->prepare("UPDATE doctors SET password = ?, updationDate = ? WHERE docEmail = ?");
                $update_stmt->bind_param("sss", $hashed_npass, $currentTime, $docEmail);
                $update = $update_stmt->execute();
                $update_stmt->close();
                
                if($update){
                    $_SESSION['msg1'] = "Password Changed Successfully !!";
                } else{
                    $_SESSION['msg1'] = "Password Change Failed !! Please try again.";
                }
            } else {
                $_SESSION['msg1'] = "New Password and Confirm Password do not match !!";
            }
        } else {
            // Log failed attempt without uid as login failed
            $uip = $_SERVER['REMOTE_ADDR'];
            $status = 0;

            // Use prepared statement for logging
            $logFailStmt = $con->prepare("INSERT INTO doctorslog (docEmail, userip, status) VALUES (?, ?, ?)");
            $logFailStmt->bind_param("ssi", $docEmail, $uip, $status);
            $logFailStmt->execute();
            $logFailStmt->close();

            $_SESSION['msg1'] = "Old Password does not match !!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doctor | Change Password</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

    <script type="text/javascript">
    function valid() {
        if(document.chngpwd.cpass.value.trim() == "") {
            alert("Current Password Field is Empty !!");
            document.chngpwd.cpass.focus();
            return false;
        }
        if(document.chngpwd.npass.value.trim() == "") {
            alert("New Password Field is Empty !!");
            document.chngpwd.npass.focus();
            return false;
        }
        if(document.chngpwd.cfpass.value.trim() == "") {
            alert("Confirm Password Field is Empty !!");
            document.chngpwd.cfpass.focus();
            return false;
        }
        if(document.chngpwd.npass.value !== document.chngpwd.cfpass.value) {
            alert("New Password and Confirm Password do not match !!");
            document.chngpwd.cfpass.focus();
            return false;
        }
        return true;
    }
    </script>
</head>
<body>
    <div id="app">		
        <?php include('include/sidebar.php');?>
        <div class="app-content">
            <?php include('include/header.php');?>

            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Doctor | Change Password</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Doctor</span>
                                </li>
                                <li class="active">
                                    <span>Change Password</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- BASIC EXAMPLE -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row margin-top-30">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="panel panel-white">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Change Password</h5>
                                            </div>
                                            <div class="panel-body">
                                                <!-- Display Success or Error Messages -->
                                                <?php if(isset($_SESSION['msg1']) && $_SESSION['msg1'] != "") { ?>
                                                    <div class="alert alert-info">
                                                        <?php echo htmlentities($_SESSION['msg1']); ?>
                                                    </div>
                                                    <?php $_SESSION['msg1'] = ""; ?>
                                                <?php } ?>
                                                
                                                <form role="form" name="chngpwd" method="post" onsubmit="return valid();">
                                                    <div class="form-group">
													
													<style>
   

      .required::after {
		  font-content: bold;
        content: ' *';
        color: red;
      }
	  
    </style>
                                                        <label for="currentPassword" class="required">Current Password</label>
                                                        <input type="password" name="cpass" class="form-control" placeholder="Enter Current Password" id="currentPassword" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="newPassword" class="required">New Password</label>
                                                        <input type="password" name="npass" class="form-control" placeholder="New Password" id="newPassword" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="confirmPassword" class="required">Confirm Password</label>
                                                        <input type="password" name="cfpass" class="form-control" placeholder="Confirm Password" id="confirmPassword" required>
                                                    </div>
                                                    <button type="submit" name="submit" class="btn btn-o btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End of Container -->
                    
                    <!-- FOOTER -->
                    <?php include('include/footer.php');?>
                    <!-- SETTINGS -->
                    <?php include('include/setting.php');?>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN JAVASCRIPTS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/form-elements.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
        });
    </script>
</body>
</html>
<?php } ?>
