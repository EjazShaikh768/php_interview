<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>

<body class="body">


    <?php require('header.php');


    // set the variable value blank
    $error_msg = "";
    if (isset($_POST['submit'])) {

        // form validation check
        if ($_POST['department'] == "") {
            $error_msg = "Input Field Required";

            // check input 
        } else if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['department'])) {
            $error_msg = "Only letters and space allowed ";
        } else {

            // stored the input value in variable
            $department = mysqli_real_escape_string($conn, $_POST['department']);

            // sql insert query 
            $sql = "INSERT INTO departments (Department) VALUES('{$department}') ";
            mysqli_query($conn, $sql) or die(mysqli_error());

            // redirect after completion
            header("location:index.php");
        }
    }

    ?>



    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 col-md-5 ">
                <!-- box start  -->

                <div class="box">
                    <!-- title   -->
                    <h2>Department</h2>
                    <!-- divider line as a bottom line  -->

                    <div class="divider"></div>
                    <!-- form start  -->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-group">
                            <label for="">Department</label>
                            <input type="text" class="form-control" name="department">
                            <span class="alert text-warning"><?php echo $error_msg; ?></span>
                        </div>
                        <div class="form-group text-center mb-3">
                            <button class="btn btn-form px-5" name="submit">SUBMIT</button>
                        </div>
                    </form>
                    <!-- form end  -->
                    <span class="text-muted ">Insert The Department Name</span>
                </div>

                <!-- box end  -->
            </div>
        </div>
    </div>


    <script src="css/bootstrap.bundle.js"></script>
</body>

</html>