<?php
session_start();
include("include/config.php");
error_reporting(0);

if (isset($_POST['submit'])) {
    $docEmail = $_POST['docEmail'];
    $dpassword = md5($_POST['password']);  // Consider using password_hash() for better security
    
    // Prepare the SQL query to avoid SQL injection
    $stmt = $con->prepare("SELECT * FROM doctors WHERE docEmail=? AND password=?");
    $stmt->bind_param("ss", $docEmail, $dpassword);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $num = $result->fetch_array();
        $_SESSION['dlogin'] = $docEmail;
        $_SESSION['id'] = $num['id'];
        $uid = $num['id'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;

        // Insert log entry
        $logStmt = $con->prepare("INSERT INTO doctorslog (uid, docEmail, userip, status) VALUES (?, ?, ?, ?)");
        $logStmt->bind_param("issi", $uid, $docEmail, $uip, $status);
        $logStmt->execute();

        header("location:dashboard.php");
    } else {
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 0;

        // Log failed attempt
        $logFailStmt = $con->prepare("INSERT INTO doctorslog (docEmail, userip, status) VALUES (?, ?, ?)");
        $logFailStmt->bind_param("ssi", $docEmail, $uip, $status);
        $logFailStmt->execute();

        echo "<script>alert('Invalid Email or Password');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doctor Login</title>
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>
<body class="login">
    <div class="row">
        <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="logo margin-top-30">
                <h2>Doctor Login</h2>
            </div>

            <div class="box-login">
                <form class="form-login" method="post">
                    <fieldset>
                        <legend>Sign in to your account</legend>
                        <p>
                            Please enter your email and password to log in.<br />
                            <span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php $_SESSION['errmsg'] = ""; ?></span>
                        </p>
                        <div class="form-group">
                            <span class="input-icon">
                                <input type="email" class="form-control" id="docEmail" name="docEmail" placeholder="Enter Your Email" required>
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <div class="form-group form-actions">
                            <span class="input-icon">
                                <input type="password" class="form-control password" name="password" placeholder="Password" required>
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary pull-right" name="submit">
                                Login <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
						
						
                    </fieldset>
                </form>

                <div class="copyright">
                    <span class="text-bold text-uppercase">Hospital Management System</span>
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/login.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            Login.init();
        });
    </script>
</body>
</html>
