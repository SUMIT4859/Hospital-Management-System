<?php
session_start();
include('include/config.php'); // Ensure this path is correct

if (isset($_POST['submit'])) {
    // Check if the session 'id' is set
    if (!isset($_SESSION['id'])) {
        echo "User not logged in.";
        exit();
    }

    $userId = $_SESSION['id'];  // Ensure 'id' is correctly set in the session
    $target_dir = "uploads/";

    // Check if a file is uploaded
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['name']) {
        $target_file = $target_dir . basename($_FILES['profile_pic']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check file size (limit to 2MB)
        if ($_FILES['profile_pic']['size'] > 2000000) {
            echo "Sorry, your file is too large.";
            exit();
        }

        // Allow only image file types (jpg, png, jpeg)
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
            echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
            exit();
        }

        // Move file to target directory
        if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
            // Sanitize the file path to prevent SQL injection
            $profile_pic = mysqli_real_escape_string($con, $target_file);

            // Update database with the new file path
            $sql = "UPDATE users SET profile_pic = '$profile_pic', updationDate = NOW() WHERE id = '$userId'";

             if (mysqli_query($con, $sql)) {
                    echo "Profile picture updated successfully.";
                } else {
                    echo "Error updating profile picture.";
                }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file was uploaded.";
    }
}
?>
