<?php

include 'db_config.php';

if (isset($_GET['deleteid'])) {

    $del_id = $_GET['deleteid'];

    $sql = "DELETE FROM employee WHERE employee_id = $del_id LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Deleted successfully";
        header('location:../adminpanel.php');
    } else {
        die(mysqli_error($conn));
    }
}
