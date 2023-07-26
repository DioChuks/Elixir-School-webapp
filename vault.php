<?php
    session_start();
    include("includes/db.php");
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>alert('Forbidden Access!!')</script>";
        echo "<script>window.open('admin.php','_self')</script>";
        
    }else{
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Student Data</title>
  </head>
  <body>
      <div class="container">
          <div class="col-md-12"><!-- col-md-12 Begin-->
               <ul class="breadcrumb"><!-- breadcrumb Begin-->
                   <li>
                    <a href="logout.php" target="_self" class="btn btn-danger" role="button">Log Out</a>
                   </li>
                   <li> <h2>\</h2> </li>
                   <li>
                       <a href="vault.php" class="btn btn-primary" role="button">Vault</a>
                   </li>
                   <li> <h2>\</h2> </li>
                   <li>
                       <a href="vault.php?upload" class="btn btn-warning" role="button">Upload Result</a>
                   </li>
               </ul><!-- breadcrumb Finish-->
           </div><!-- col-md-12 Finish-->
           <?php if(isset($_GET['upload'])){
                  include_once('uploadresult.php');
              }else{
                  ?>
          <div class="row">
      <h2>Student Credentials for result uploaded</h2>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Student Name</th>
      <th scope="col">Student ID</th>
      <th scope="col">Student Key</th>
    </tr>
  </thead>
  <tbody>
    <?php
  $sql1 = "SELECT * FROM students WHERE 2ndterm2023 != ''";
    $query = mysqli_query($con, $sql1);
    $i = 0;
    while($row_query = mysqli_fetch_array($query)){  
        $student_id = $row_query['student_id'];
        $student_name = $row_query['student_name'];
        $student_roll_id = $row_query['student_roll_id'];
        $student_class = $row_query['student_class'];
        $i++;
    ?>
    <tr>
      <th scope="row"><?php echo $student_id; ?></th>
      <td><?php echo $student_name; ?></td>
      <td><?php echo $student_roll_id; ?></td>
      <td><?php echo $student_class; ?></td>
    </tr>
<?php }?>
    
  </tbody>
</table>
</div>
<br>
<hr>
<br>
<div class="row">
<h2>Students with no result yet</h2>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Student Name</th>
      <th scope="col">Student ID</th>
      <th scope="col">Student Class</th>
    </tr>
  </thead>
  <tbody>
    <?php
  $sql1 = "SELECT * FROM students WHERE 2ndterm2023 = ''";
    $query = mysqli_query($con, $sql1);
    $i = 0;
    while($row_query = mysqli_fetch_array($query)){  
        $student_id = $row_query['student_id'];
        $student_name = $row_query['student_name'];
        $student_roll_id = $row_query['student_roll_id'];
        $student_class = $row_query['student_class'];
        $i++;
    ?>
    <tr>
      <th scope="row"><?php echo $student_id; ?></th>
      <td><?php echo $student_name; ?></td>
      <td><?php echo $student_roll_id; ?></td>
      <td><?php echo $student_class; ?></td>
    </tr>
<?php }?>
    
  </tbody>
</table>
</div>
<?php }?>
</div>
</body>
</html>
<?php }?>