<?php
require('connection.php');


?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12 header">
            <h1></h1>
            <div class="text-end">
            <button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="fa-solid fa-bars-staggered"></i></button>

            </div>
<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h1 class="offcanvas-title" id="offcanvasScrollingLabel">Interview Task </h1>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <div class="list-group text-start list-group-flush">
  <a type="button" href="index.php" class="list-group-item list-group-item-action <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php' )? 'active': ''  ?>">Department List</a>
  <a type="button" href="departmet-form.php" class="list-group-item list-group-item-action <?php echo (basename($_SERVER['PHP_SELF']) == 'departmet-form.php' )? 'active': ''  ?>">Department Form</a>
  <a type="button" href="employees.php" class="list-group-item list-group-item-action <?php echo (basename($_SERVER['PHP_SELF']) == 'employees.php' )? 'active': ''  ?>">Employee List</a>
  <a type="button" href="employees-form.php" class="list-group-item list-group-item-action <?php echo (basename($_SERVER['PHP_SELF']) == 'employees-form.php' )? 'active': ''  ?>">Employee Form</a>
</div>
  </div>
</div>
        </div>
    </div>
</div>