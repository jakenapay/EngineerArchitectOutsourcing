<?php

if (isset($_POST['submit']) && isset($_FILES['image']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['position'])) {
    include "db_config.php";

    // data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $position = $_POST['position'];

    // image
    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

    // check image if okay

    // check if no errors
    if ($error === 0) {

        // check if file size too large
        if ($img_size > 1250000) {
            $em = "Sorry, your file is too large.";
            header("Location: ../index.php?error=$em");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            // check if correct file type
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../employee_images/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                $sql = "INSERT INTO `employee`(`employee_fname`, `employee_lname`, `employee_mname`, `employee_position`, `employee_img`) VALUES ('$fname','$lname','$mname','$position','$new_img_name')";
                mysqli_query($conn, $sql);
                $em = "Employee added successfully.";
                header("Location: ../adminpanel.php?message=$em");
            } else {
                $em = "You can't upload files of this type";
                header("Location: ../index.php?error=$em");
            }
        }
    } else {
        $em = "unknown error occurred!";
        header("Location: ../index.php?error=$em");
    }
} else {
    header("Location: ../index.php");
}
