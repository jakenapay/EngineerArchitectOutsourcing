<?php
include 'php/db_config.php';
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
    <link rel="stylesheet" type="text/css" href="./css/adminpanel.css">
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>

<body>

    <section class="header">
        <div class="container">
            <h2 class="content-title">
                Admin Dashboard
            </h2>

        </div>
    </section>
    <section id="employee_dashboard">
        <div class="container">
            <form action="php/upload_employee.php" method="post" enctype="multipart/form-data">
                <div class="row d-flex justify-content-center">
                    <?php if (isset($_GET['message'])) : ?>
                        <div class="col-sm-12 col-md-12 col-lg-12 message-box text-center">
                            <p class="content-subtitle"><?php echo $_GET['message']; ?></p>
                        </div>
                    <?php endif ?>

                    <div class="col-sm-12 col-md-5 col-lg-5">
                        <label for="fname">First Name</label>
                        <input id="fname" class="input" name="fname" type="text" placeholder="First Name*" required>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5">
                        <label for="lname">Last Name</label>
                        <input id="lname" class="input" name="lname" type="text" placeholder="Last Name*" required>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <label for="mname">Middle Initial</label>
                        <input id="mname" class="input" name="mname" type="text" placeholder="M.i.">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <label for="position">Job Position</label>
                        <input id="position" class="input" name="position" type="text" placeholder="Job Position*" required>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <label for="image">Profile Picture</label>
                        <input id="image" class="input" name="image" type="file" required>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 pt-2">
                        <button id="upload" class="upload button-action" name="close" type="button">Close</button>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 pt-2">
                        <button id="upload" class="upload button-action" name="add_employee" type="submit">Add Employee</button>
                    </div>
                </div>
            </form>
        </div>
    </section>


    <section id="employee_profiles">
        <div class="container">
            <div class="row g-0 d-flex justify-content-center">
                <?php
                $sql = "SELECT * FROM employee";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="col-sm-12 col-md-4 col-lg-4 align-self-center">
                            <div class="wrapper p-1 m-1 rounded">
                                <div class="image-container">
                                    <img class="mt-1 img-fluid emp-image" src="employee_images/<?php echo $row['employee_img'] ?>" alt="Profile">
                                </div>
                                <h2 class="content-name"><?php echo $row['employee_lname'] ?>, <?php echo $row['employee_fname'] ?> <?php echo $row['employee_mname'] ?></h2>
                                <p class="content-position"><?php echo $row['employee_position'] ?></p>
                                <button id="delete-button" class="button-action">
                                    <a href="php/delete.php?deleteid=<?php echo $row['employee_id'] ?>" onclick="return confirm('Are you sure you want to delete?');"><i class="fas fa-trash"></i> Delete</a>
                                </button>
                                <button id="update-button" class="button-action">
                                    <a href="php/update.php?updateid=<?php echo $row['employee_id'] ?>"><i class="fas fa-pencil-alt"></i> Update</a></button>
                            </div>
                        </div>

                <?php
                    }
                } else {
                    echo "<p>No records.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>


</html>