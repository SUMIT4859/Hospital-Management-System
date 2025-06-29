<?php
session_start();
include('include/config.php');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = md5($_POST['password']);
$dob = $_POST['dob'];
$email = $_POST['email'];
$phone_number = $_POST['country_code'] . $_POST['phone_number'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$terms_conditions = isset($_POST['terms_conditions']) ? 1 : 0;

$profile_photo_path = '';

if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] == 0) {
    $target_dir = "assets/uploads/";
    $profile_photo = $_FILES['profile_photo'];
    $target_file = $target_dir . basename($profile_photo["name"]);

    // Ensure the uploads directory exists
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Move the uploaded file
    if (move_uploaded_file($profile_photo["tmp_name"], $target_file)) {
        $profile_photo_path = $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$query = "INSERT INTO register (first_name, last_name, password, dob, email, phone_number, gender, address, profile_photo, terms_conditions)
          VALUES ('$first_name', '$last_name', '$password', '$dob', '$email', '$phone_number', '$gender', '$address', '$profile_photo_path', '$terms_conditions')";
		  
		    if (mysqli_query($con, $query)) {
        $sqlAdmin = "INSERT INTO admin (email, password)
                     SELECT email, password FROM register WHERE email = '$email'";
        
        if (mysqli_query($con, $sqlAdmin)) {
            echo "Registration successful, and credentials copied to admin.";
        } else {
            echo "Error copying data to admin: " . mysqli_error($con);
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }

if ($con->query($query) === TRUE) {
    $_SESSION['user_id'] = $con->insert_id;
    $_SESSION['first_name'] = $first_name;
    $_SESSION['email'] = $email;
    header("Location: edit_profile.php");
} else {
    echo "Error: " . $query . "<br>" . $con->error;
}

$con->close();
// Inside process_registration.php
// Assuming registration was successful
header('Location: ../index.php');
exit();

?>
