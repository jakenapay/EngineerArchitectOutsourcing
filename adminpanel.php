<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Architectural & Engineering Outsourcing</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

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
    <section class="employee_dashboard">
        <div class="container">
            <form action="php/upload_employee.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <?php if (isset($_GET['message'])) : ?>
                        <div class="col-sm-12 col-md-12 col-lg-12 message-box text-center">
                            <p class="content-subtitle"><?php echo $_GET['message']; ?></p>
                        </div>
                    <?php endif ?>

                    <div class="col-sm-12 col-md-5 col-lg-5">
                        <input id="fname" class="input" name="fname" type="text" placeholder="First Name" required>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5">
                        <input id="lname" class="input" name="lname" type="text" placeholder="Last Name" required>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <input id="mname" class="input" name="mname" type="text" placeholder="M.i." required>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <input id="email" class="input" name="email" type="email" placeholder="Email Address" required>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <input id="position" class="input" name="position" type="text" placeholder="Job Position" required>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <input id="image" class="input" name="image" type="file" required>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 pt-2">
                        <button id="upload" class="upload" name="submit" type="submit">Upload</button>
                    </div>
                </div>
            </form>


        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>


</html>