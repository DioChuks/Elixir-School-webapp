<?php

session_start();

include("includes/db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Login</title>
    <link rel="shortcut icon" href="elixirlogo.png" type="image/x-icon" />
    <link rel="stylesheet" href="styles/portal.css">
</head>
<body>
<header>
        <nav>
            <div class="logohead">
                <h1>Elixir School</h1>
            </div>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Portal</li>
                <li><a href="activity.html">Activity</a></li>
                <li><a href="newsletter.html">Newsletter</a></li>
                <li><a href="about.html">About Us</a></li>
            </ul>
            <box-icon name='menu' animation='tada' id="menu" ></box-icon>
        </nav>

    </header>

    <div class="loginbox">
        <img src="elixirlogo.png" alt="icon" class="logo">
        <h3>Portal</h3>
        <form action="" method="post" enctype="multipart/form-data">
                <p>Student ID</p>
                <input type="text" placeholder="ID" name="s_roll_id" required>
                <p>Student Key</p>
                <input type="password" placeholder="password" name="s_class" required>
                <input type="submit" value="Check Result" name="login">
              <a href="admin.php">Admin Panel</a> <br>
              <a href="contact.php">Contact Us</a>
          </form><!-- form Finish-->
    </div>
    
    <!-- Footer -->
    <footer>
        <p>Made with <box-icon name='heart' type='solid' color='red'></box-icon> 2022 Elixir School. All Rights Reserved</p>
    </footer>
 
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
    <script src="js/menu.js"></script>   
</body>
</html>

<?php 

if(isset($_POST['login'])){
    
    $student_roll_id = mysqli_real_escape_string($con,$_POST['s_roll_id']);
    
    $student_class = mysqli_real_escape_string($con,$_POST['s_class']);
    
    $select_student = "select * from students WHERE student_roll_id='$student_roll_id' AND student_class='$student_class'";
    
    $run_student = mysqli_query($con,$select_student);
    
    $check_student = mysqli_num_rows($run_student);
    
    if($check_student){
        
        $_SESSION['student_roll_id']=$student_roll_id;
        $_SESSION['student_class']=$student_class;
        
        echo "<script>alert('Your are logged in')</script>";
        
        echo "<script>window.open('result.php','_self')</script>";
        
        exit();
        
    }
    
    else{
        
        echo "<script>alert('Student Id or Key is incorrect')</script>";
        
    }
}
    ?>