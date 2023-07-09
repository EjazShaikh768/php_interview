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
    $error_msg = "";
    if (isset($_POST['submit'])) {

        if ($_POST['department'] == "") {
            $error_msg = "Input Field Required";
        }else if(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['department'])){
            $error_msg = "Only letters and space allowed ";
              
        }else {

            $department = mysqli_real_escape_string($conn, $_POST['department']);

            $sql = "INSERT INTO departments (Department) VALUES('{$department}') ";
            mysqli_query($conn, $sql) or die(mysqli_error());

            header("location:index.php");
        }
    }

    ?>



    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 col-md-5 ">
                <div class="box">
                    <h2>Department</h2>
                    <div class="divider"></div>
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
                    <span class="text-muted ">Insert The Department Name</span>
                </div>
            </div>
        </div>
    </div>


    <script src="css/bootstrap.bundle.js"></script>
</body>

</html>