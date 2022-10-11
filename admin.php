<?php

// db config
$host = "localhost";
$user = "root";
$pass = "";
$db = "eao";

// connecting to database
$conn = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_errno()) {
    die("Error connecting to server.");
}

// adding new visitors
$ip_visit = $_SERVER['REMOTE_ADDR'];

// testing purpose
// $ip_visit = "27:27:27";

// checking if visitor is unique
$query = "SELECT * FROM counter_table WHERE ip_address='$ip_visit'";
$result = mysqli_query($conn, $query);

// checking query error
if (!$result) {
    die("Retriving Query Error<br>." . $query);
}
$total_visits = mysqli_num_rows($result);
if ($total_visits < 1) {
    $query = "INSERT INTO counter_table(ip_address) VALUES('$ip_visit')";
    $result = mysqli_query($conn, $query);
}


// retriving existing visitors
$query = "SELECT * FROM counter_table";
$result = mysqli_query($conn, $query);

// checking query error
if (!$result) {
    die("Retriving Query Error<br>." . $query);
}
$total_visits = mysqli_num_rows($result);

// Adding new visitor

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p style="display:none;">visitor: <?php echo $total_visits; ?></p>
</body>

</html>