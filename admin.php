<?php 
    
    session_start();

    include("includes/db.php");
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html">
    <title>Admin Portal</title>
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
                <li class="active">Admin Panel</li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <box-icon name='menu' animation='tada' id="menu" ></box-icon>
        </nav>

    </header>

    <div class="loginbox">
        <img src="elixirlogo.png" alt="icon" class="logo">
        <h3>Admin Portal</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <p>Admin Id:</p>
            <input type="text" placeholder="Admin ID" name="admin_email" required>
            <p>Admin Key:</p>
            <input type="password" placeholder="Admin Password" name="admin_pass" required>
            <input type="submit" value="Submit" name="adminLogin">
            <a href="portal.php">Result Portal</a><br>
            <a href="index.html">Home</a>
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

if(isset($_POST['adminLogin'])){
    $admin_id = mysqli_real_escape_string($con,$_POST['admin_email']);
    $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
    $select_admin = "SELECT * FROM admins WHERE admin_email='$admin_id' AND admin_pass='$admin_pass'";
    $run_admin = mysqli_query($con,$select_admin);
    $check_admin = mysqli_num_rows($run_admin);
    
    if($check_admin){
        $_SESSION['admin_email']=$admin_id;
        $_SESSION['admin_pass']=$admin_pass;
        echo "<script>alert('School-Vault Opened!')</script>";
        echo "<script>window.open('vault.php','_self')</script>";
        exit();
    }
    else{
        echo "<script>alert('Admin Id or Key is incorrect')</script>";
    }
}
    ?>