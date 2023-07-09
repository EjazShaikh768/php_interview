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

    <title>Deparment Page</title>
</head>

<body class="body">

<?php require('header.php'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 ">
                <div class="box table-responsive">
                <div class="col-12 text-end">
                    <a  href="employees-form.php" class="btn btn-secondary">+</a>
                </div>
              
                <h2>Employees</h2>
                <div class="divider"></div>
                    <table class="table table-hover  ">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Department</th>
                                <th scope="col">Age</th>
                                <th scope="col">Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                $sql = "SELECT * FROM employees JOIN departments ON employees.department = departments.DepartmentID ";
                $result = mysqli_query($conn,$sql) or die(mysqli_error());
                if (mysqli_num_rows($result) > 0) {
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['Department']; ?></td>
                                <td><?php echo $row['age']; ?></td>
                                <td><?php echo $row['salary']; ?></td>
                            </tr>
                            <?php } }else {
                                echo '<div class="alert alert-warning" role="alert">
                                There is no Records!
                              </div>';
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




    <script src="css/bootstrap.bundle.js"></script>
</body>

</html>