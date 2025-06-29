<?php
session_start();

// Enable error reporting for debugging (disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('include/config.php');

// Check if the user is logged in
if (!isset($_SESSION['id']) || strlen($_SESSION['id']) == 0) {
    header('Location: logout.php');
    exit();
}

$msg = ""; // Initialize message variable

if (isset($_POST['submit'])) {
    // Retrieve and sanitize form inputs
    $docspecialization = trim($_POST['Doctorspecialization']);
    $docname = trim($_POST['docname']);
    $docaddress = trim($_POST['clinicaddress']);
    $docfees = trim($_POST['docfees']);
    $doccontactno = trim($_POST['doccontact']);
    $docemail = trim($_POST['docemail']);

    // Handle Profile Picture Upload
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
        $allowed = ["jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png"];
        $filename = $_FILES['profile_pic']['name'];
        $filetype = $_FILES['profile_pic']['type'];
        $filesize = $_FILES['profile_pic']['size'];

        // Verify file extension
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        if (!array_key_exists($ext, $allowed)) {
            $msg = "Error: Please select a valid file format.";
        }

        // Verify file size - 5MB maximum
        if ($filesize > 5 * 1024 * 1024) {
            $msg = "Error: File size is larger than the allowed limit.";
        }

        // Verify MIME type
        if (in_array($filetype, $allowed)) {
            // Check whether profile_pic directory exists, if not, create it
            $upload_dir = 'uploads/profile_pics/';
            if (!is_dir($upload_dir)) {
                if (!mkdir($upload_dir, 0755, true)) {
                    $msg = "Error: Failed to create directories for uploads.";
                }
            }

            // Generate a unique filename to prevent overwriting
            $newFilename = $upload_dir . uniqid() . "." . $ext;

            // Move the file to the upload directory
            if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $newFilename)) {
                // Optionally, delete the old profile picture if exists
                $stmt_old = $con->prepare("SELECT profile_pic FROM doctors WHERE id = ?");
                $stmt_old->bind_param("i", $_SESSION['id']);
                $stmt_old->execute();
                $result_old = $stmt_old->get_result();
                if ($result_old->num_rows == 1) {
                    $data_old = $result_old->fetch_assoc();
                    if (!empty($data_old['profile_pic']) && file_exists($data_old['profile_pic'])) {
                        unlink($data_old['profile_pic']);
                    }
                }
                $profilePic = $newFilename;
                $stmt_old->close();
            } else {
                $msg = "Error: Failed to upload profile picture.";
            }
        } else {
            $msg = "Error: There was a problem with your upload. Please try again.";
        }
    } else {
        // If no new profile picture is uploaded, retain the old one
        $stmt_old = $con->prepare("SELECT profile_pic FROM doctors WHERE id = ?");
        $stmt_old->bind_param("i", $_SESSION['id']);
        $stmt_old->execute();
        $result_old = $stmt_old->get_result();
        if ($result_old->num_rows == 1) {
            $data_old = $result_old->fetch_assoc();
            $profilePic = $data_old['profile_pic'];
        } else {
            $profilePic = ''; // Default value if not found
        }
        $stmt_old->close();
    }

    // Proceed only if no upload errors
    if (empty($msg)) {
        // Prepare and bind the SQL statement to prevent SQL injection
        $stmt = $con->prepare("UPDATE doctors SET specilization = ?, doctorName = ?, address = ?, docFees = ?, contactno = ?, profile_pic = ? WHERE id = ?");
        if ($stmt === false) {
            die("Prepare failed: " . htmlspecialchars($con->error));
        }

        $stmt->bind_param("sssissi", $docspecialization, $docname, $docaddress, $docfees, $doccontactno, $profilePic, $_SESSION['id']);
        if ($stmt->execute()) {
            $msg = "Doctor Details updated Successfully.";
        } else {
            $msg = "Error: Could not update doctor details. Please try again later.";
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doctor | Edit Doctor Details</title>

    <!-- CSS Includes -->
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
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Doctor | Edit Doctor Details</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Doctor</span>
                                </li>
                                <li class="active">
                                    <span>Edit Doctor Details</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- END PAGE TITLE -->

                    <!-- BASIC EXAMPLE -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Display Success or Error Message -->
                               

                                <div class="row margin-top-30">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="panel panel-white">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Edit Doctor</h5>
                                            </div>
                                            <div class="panel-body">
                                                <?php 
                                                // Fetch doctor details
                                                $did = $_SESSION['id']; // Assuming 'id' is the doctor's ID
                                                $stmt = $con->prepare("SELECT * FROM doctors WHERE id = ?");
                                                $stmt->bind_param("i", $did);
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                if ($result->num_rows == 1) {
                                                    $data = $result->fetch_assoc();
                                                ?>
                                                    <h4><?php echo htmlentities($data['doctorName']); ?>'s Profile</h4>
                                                    <p><b>Profile Reg. Date: </b><?php echo htmlentities($data['creationDate']); ?></p>
                                                    <?php if ($data['updationDate']): ?>
                                                        <p><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']); ?></p>
                                                    <?php endif; ?>
                                                    <hr />
                                                    <form action="" role="form" name="adddoc" method="post" enctype="multipart/form-data" onsubmit="return valid();">
                                                        <!-- Doctor Specialization -->
                                                        <div class="form-group">
                                                            <label for="DoctorSpecialization">Doctor Specialization</label>
                                                            <select name="Doctorspecialization" class="form-control" required>
                                                                <option value="<?php echo htmlentities($data['specilization']); ?>">
                                                                    <?php echo htmlentities($data['specilization']); ?>
                                                                </option>
                                                                <?php 
                                                                // Fetch all specializations
                                                                $ret = mysqli_query($con, "SELECT * FROM doctorspecilization");
                                                                while ($row = mysqli_fetch_array($ret)) {
                                                                ?>
                                                                    <option value="<?php echo htmlentities($row['specilization']); ?>">
                                                                        <?php echo htmlentities($row['specilization']); ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <!-- Doctor Name -->
                                                        <div class="form-group">
                                                            <label for="doctorname">Doctor Name</label>
                                                            <input type="text" name="docname" class="form-control" id="doctorname" value="<?php echo htmlentities($data['doctorName']); ?>" required>
                                                        </div>

                                                        <!-- Clinic Address -->
                                                        <div class="form-group">
                                                            <label for="address">Doctor Clinic Address</label>
                                                            <textarea name="clinicaddress" class="form-control" id="address" required><?php echo htmlentities($data['address']); ?></textarea>
                                                        </div>

                                                        <!-- Consultancy Fees -->
                                                        <div class="form-group">
                                                            <label for="fees">Doctor Consultancy Fees</label>
                                                            <input type="text" name="docfees" class="form-control" id="fees" required value="<?php echo htmlentities($data['docFees']); ?>">
                                                        </div>
                                                        
                                                        <!-- Contact Number -->
                                                        <div class="form-group">
                                                            <label for="contactno">Doctor Contact No</label>
                                                            <input type="text" name="doccontact" class="form-control" id="contactno" required="true" maxlength="10" value="<?php echo htmlentities($data['contactno']); ?>">
                                                        </div>

                                                        <!-- Email -->
                                                        <div class="form-group">
                                                            <label for="docemail">Doctor Email</label>
                                                            <input type="email" name="docemail" class="form-control" id="docemail" readonly value="<?php echo htmlentities($data['docEmail']); ?>">
                                                        </div>

                                                        <!-- Profile Picture -->
                                                        <div class="form-group">
                                                            <label for="profile_pic">Profile Picture</label>
                                                            <input type="file" name="profile_pic" class="form-control-file" id="profile_pic" accept="image/*">
                                                         
                                                        </div>
                                                        <br>
                                                        
                                                        <button type="submit" name="submit" class="btn btn-o btn-primary">Update</button>
                                                    </form>
                                                <?php 
                                                } else {
                                                    echo "<p>Doctor data not found.</p>";
                                                }
                                                $stmt->close();
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END BASIC EXAMPLE -->
                    </div>
                </div>
            </div>
            <!-- FOOTER -->
            <?php include('include/footer.php'); ?>
            <!-- END FOOTER -->
        </div>

        <!-- JavaScript Includes -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/modernizr/modernizr.js"></script>
        <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="vendor/switchery/switchery.min.js"></script>
        <!-- JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
        <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="vendor/autosize/autosize.min.js"></script>
        <script src="vendor/selectFx/classie.js"></script>
        <script src="vendor/selectFx/selectFx.js"></script>
        <script src="vendor/select2/select2.min.js"></script>
        <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
        <!-- CLIP-TWO JAVASCRIPTS -->
        <script src="assets/js/main.js"></script>
        <!-- JavaScript Event Handlers for this page -->
        <script src="assets/js/form-elements.js"></script>

        <!-- Alert Box for Success or Error Message -->
        <?php if (!empty($msg)): ?>
            <script>
                alert("<?php echo htmlentities($msg); ?>");
            </script>
        <?php endif; ?>

        <!-- Form Validation Script -->
        <script>
            function valid() {
                // Example validation: Ensure that all required fields are filled
                var specialization = document.forms["adddoc"]["Doctorspecialization"].value;
                var docname = document.forms["adddoc"]["docname"].value.trim();
                var clinicaddress = document.forms["adddoc"]["clinicaddress"].value.trim();
                var docfees = document.forms["adddoc"]["docfees"].value.trim();
                var doccontact = document.forms["adddoc"]["doccontact"].value.trim();

                if (specialization === "" || docname === "" || clinicaddress === "" || docfees === "" || doccontact === "") {
                    alert("All fields are required.");
                    return false;
                }

                // Additional validations can be added here
                // Example: Validate that docfees and doccontact are numeric
                if (isNaN(docfees) || isNaN(doccontact)) {
                    alert("Consultancy Fees and Contact Number must be numeric.");
                    return false;
                }

                return true;
            }
        </script>
    </body>
</html>

