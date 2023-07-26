<?php

    session_start();

    include("includes/db.php");

    if(!isset($_SESSION['student_roll_id'])){

        echo "<script>alert('Forbidden Access!!')</script>";
        echo "<script>window.open('portal.php','_self')</script>";

    }else{

        $student_session = $_SESSION['student_roll_id'];

        $get_student = "select * from students where student_roll_id='$student_session'";

        $run_student = mysqli_query($con, $get_student);

        $row_student = mysqli_fetch_array($run_student);

        $student_id = $row_student['student_id'];

        $student_name = $row_student['student_name'];

        $result_image = $row_student['s_result_image'];

        $result_term3 = $row_student['3rdterm_result'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html">
    <title>RESULT</title>
    <link rel="shortcut icon" href="elixirlogo.png" type="image/x-icon" />
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/result.css">
</head>
<body>
    <div id="content"><!-- #content Begin-->
       <div class="container"><!-- container Begin-->
           <div class="col-md-12"><!-- col-md-12 Begin-->

               <ul class="breadcrumb"><!-- breadcrumb Begin-->
                   <li>
                    <a href="logout.php" class="btn btn-danger" role="button">Log Out</a>
                   </li>
                   <li> \ </li>
                   <li>
                       Result
                   </li>
               </ul><!-- breadcrumb Finish-->

           </div><!-- col-md-12 Finish-->

        </div><!-- container Finish -->

    </div><!-- content Finish -->

<div class="container">
  <h2>
      <?php

            $get_student = "select * from students where student_id='$student_id'";

            $run_student = mysqli_query($con, $get_student);

            $row_student = mysqli_fetch_array($run_student);

            $student_name = $row_student['student_name'];

            echo $student_name;

        ?>
        <small>School Result</small></h2>

        <!-- result image -->
        <?php
        if($student_session){
            $result_image = $row_student['s_result_image'];
            $result_doc = $row_student['2ndterm2023'];
            if($result_doc == NULL){
                echo '<div class="alert alert-danger" role="alert">
                    Result Unavailable/Contact School!
                </div>
                <!-- Display the countdown timer in an element -->
                <blockquote class="blockquote">
                  <p class="mb-0" id="demo"></p>
                </blockquote>

                <script>
                // Set the date we are counting down to
                var countDownDate = new Date("Apr 23, 2023 15:00:00").getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {

                  // Get today date and time
                  var now = new Date().getTime();

                  // Find the distance between now and the count down date
                  var distance = countDownDate - now;

                  // Time calculations for days, hours, minutes and seconds
                  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                  // Display the result in the element with id="demo"
                  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                  + minutes + "m " + seconds + "s ";

                  // If the count down is finished, write some text
                  if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                  }
                }, 1000);
                </script>';
            }else{
                echo'<iframe src="https://docs.google.com/gview?url=http://elixirschool.com.ng/result_docs/'.$result_doc.'&embedded=true" style="width:600px; height:500px;" frameborder="0"></iframe>';
                echo'<a href="result_docs/'.$result_doc.'" class="btn btn-primary" role="button">Download Result PDF here</a>';
            }

        }else{
            echo '<div class="alert alert-danger" role="alert">
                    Result Error/Contact School!
                </div>';
        }

    ?>
</div>
<div class="oldresult">
    <?php
    if($student_session){
        $result_image = $row_student['s_result_image'];
        if ($result_image == '') {
          echo'<div class="container">
                  <a href="#" class="btn btn-primary btn-lg" role="button">Click here to View 2021/2022 result</a>
               </div>';
        }else{
           echo'<div class="container">
                   <a href="result_images/'.$result_image.'" class="btn btn-primary btn-lg" role="button">Click here to View 2021/2022 result</a>
                </div>';
          }
    }else{
        echo'<div class="alert alert-danger" role="alert">
                Result Unavailable/Contact School!
            </div>';
    }
    ?>

</div>


<!-- Footer -->
<div class="footer">
    <p>Made with <box-icon name='heart' type='solid' color='red'></box-icon> 2022 Elixir School. All Rights Reserved</p>
</div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
</body>
</html>

<?php } ?>
