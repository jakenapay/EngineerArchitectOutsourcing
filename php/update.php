<?php
include 'db_config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Architectural & Engineering Outsourcing</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


    <!-- css -->
    <link rel="stylesheet" type="text/css" href="../css/adminpanel.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>

<body>

    <section class="header">
        <div class="container">
            <h2 class="content-title">
                Update Employee
            </h2>

        </div>
    </section>

    <section id="employee_dashboard">
        <div class="container">
            <?php
            $id = $_GET['id'];
            $query = "SELECT * FROM employee WHERE employee_id = '$id'";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $row) {
            ?>
                    <form action="php/upload_employee.php" method="post" enctype="multipart/form-data">
                        <div class="row d-flex justify-content-center">
                            <div class="col-sm-12 col-md-5 col-lg-5">
                                <input id="fname" class="input" value="<?php echo $row['employee_fname'] ?>" name="fname" type="text" placeholder="First Name" required>
                            </div>
                            <div class="col-sm-12 col-md-5 col-lg-5">
                                <input id="lname" class="input" value="<?php echo $row['employee_lname'] ?>" name="lname" type="text" placeholder="Last Name" required>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2">
                                <input id="mname" class="input" value="<?php echo $row['employee_mname'] ?>" name="mname" type="text" placeholder="M.i." required>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <input id="position" class="input" value="<?php echo $row['employee_position'] ?>" name="position" type="text" placeholder="Job Position" required>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <input id="image" class="input" value="<?php echo $row['employee_img'] ?>" name="image" type="file" required>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 pt-2">
                                <button id="upload" class="upload" name="close" type="button">
                                    <a href="../adminpanel.php">Back</a>
                                </button>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 pt-2">
                                <button id="upload" class="upload" name="submit" type="submit">
                                    <a href="updateprocess.php">Update</a>

                                </button>
                            </div>
                        </div>
                    </form>
            <?php
                }
            }
            ?>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>


</html>