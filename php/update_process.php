<?php
session_start();
include 'db_config.php';

if (isset($_POST['update'])) {

    $uid = $_SESSION['uid'];

    $sql = "SELECT * FROM employee WHERE employee_id=$uid LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            $fname = $row['employee_fname'];
            $lname = $row['employee_lname'];
            $mname = $row['employee_mname'];
            $postion = $row['employee_position'];
            $image = $row['employee_img'];

            if ($error === 0) {

                // check if file size too large
                if ($img_size > 1250000) {
                    $em = "Sorry, your file is too large.";
                    header("Location: ../index.php?error=$em");
                } else {
                    $img_ex = pathinfo($image, PATHINFO_EXTENSION);
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
                        header("Location: ../adminpanel.php");
                    } else {
                        $em = "You can't upload files of this type";
                        header("Location: ../index.php?error=$em");
                    }
                }
            } else {
                $em = "unknown error occurred!";
                header("Location: ../index.php?error=$em");
            }
        }
    } else {
        echo "0 results";
    }
    $conn->close();

    echo "s";
}
