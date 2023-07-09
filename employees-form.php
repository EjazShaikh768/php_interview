<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Document</title>
</head>

<body class="body">


    <?php
    require('header.php');

    $error_msg1 = $error_msg2 = $error_msg3 = $error_msg4 = "";
    $name = $department = $age = $salary = "";

    if (isset($_POST['submit'])) {

          
      
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $department = mysqli_real_escape_string($conn, $_POST['department']);
            $age = mysqli_real_escape_string($conn, $_POST['age']);
            $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    
            if ($name === '') {
                $error_msg1 = " Name required";
            }else if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
                $error_msg1 = "Only letters and space allowed ";
            }else if($department === ''){
                $error_msg2 = "department required";
            }else if($age === ''){
                $error_msg3 = "age is required";
            }else if(!preg_match("/^[0-9' ]*$/",$age)){
                $error_msg3 = "Only Number allowed ";
            }else if($salary === ''){
                $error_msg4 = 'salary is required';
            }else if(!preg_match("/^[0-9' ]*$/",$salary)){
                $error_msg4 = "Only Number allowed ";
            }else{
                $sql = "INSERT INTO employees (`name`, `department`, `age`, `salary`) VALUES('{$name}','{$department}','{$age}','{$salary}') ";
                if (mysqli_query($conn, $sql)) {
                    header("location:employees.php");
                }else {
                    echo "<script>alert('Please Check')</script>";
                }
            }

           
        }
           
        
    
    ?>



    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 col-md-5 ">

                <div class="box">
                    <h2>Emoployees</h2>
                    <div class="divider"></div>
                    <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="form-group">
                            <label for="">Ful Name</label>
                            <input type="text" class="form-control" name="name"  value="<?php echo $name; ?>">
                            <span class="alert text-warning"><?php echo $error_msg1; ?></span>
                        </div>
                        <div class="form-group ">
                            <label for="">Choose Department</label>
                            <select name="department" id="" class="form-control">
                                <?php
                                $res = mysqli_query($conn, "SELECT * FROM departments");
                                if (mysqli_num_rows($res) > 0) {
                                    while ($row = mysqli_fetch_assoc($res)) { ?>
                                        <option value="<?php echo $row["DepartmentID"]; ?>"><?php echo $row["Department"]; ?> </option>
                                <?php }
                                } else {
                                    echo 'no department';
                                }          ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">age</label>
                            <input type="text" class="form-control" name="age" value="<?php echo $age; ?>">
                            <span class="alert text-warning"><?php echo $error_msg3; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="">Salary</label>
                            <input type="text" class="form-control" name="salary" value="<?php echo $salary; ?>">
                            <span class="alert text-warning"><?php echo $error_msg4; ?></span>
                        </div>
                        <div class="form-group text-center mb-3">
                            <button class="btn btn-form px-5" name="submit">SUBMIT</button>
                        </div>
                    </form>
                    <span class="text-muted ">Insert The Employee Details</span>
                </div>
            </div>
        </div>
    </div>

    <script src="css/bootstrap.bundle.js"></script>
</body>

</html>