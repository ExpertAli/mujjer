<?php
  $filePath='../connection.php';
  
  if(!file_exists($filePath)){
    echo 'Connection File not found';
  }else{
    include_once $filePath;
    session_start();
    if(empty($_SESSION['studentid'])){
      header('location:../index.php');
    }else{
      $sql="SELECT * FROM industry WHERE student=".$_SESSION['studentid']."";
      $result=$conn->query($sql) or die($conn->error);
      if($result->num_rows > 0){
        $row=$result->fetch_assoc();
        //print_r($row);
      }

    }
  }
?>
<doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>Dashboard | Industrial M&E </title>
  </head>
  <body>
    <div class="container-fluid p-3">
<!--        navbar-->
      <?php include_once "navbar.php"; ?>
<!--        <div class="row"></div>-->
     <div class="row">
        
         <div class="col-sm-8 offset-md-2 text-center">
             <div class="jumbotron">
                 <div class="display-4">Student Dashboard </div>
                  <div class="lead">This is a Industrial Training Monitoring and Evaluation System</div>
                 <hr class="my-4">
                 <p>Welcome to Student dashboard</p>

             </div>
             <hr />
             <div class="col-8 offset-md-2 text-center">
               <h1 class="text-success border border-success mb-0 pb-2">Training Information</h1>
               <div class="row bg-success text-white  ">
                
                <div class="col-4 m-2 p-2">Company</div><div class="col-7"><?php echo $row['company']; ?></div>
                <div class="col-4 m-2 p-2">Location</div><div class="col-7"><?php echo $row['location']; ?></div>
                <div class="col-4 m-2 p-2">Email</div><div class="col-7"><?php echo $row['email']; ?></div>
                <div class="col-4 m-2 p-2">Phone Number</div><div class="col-7"><?php echo $row['phone_number']; ?></div>
                <div class="col-4 m-2 p-2">Date Started</div><div class="col-7"><?php echo $row['startdate']; ?></div>
                <div class="col-4 m-2 p-2">Date of Finish</div><div class="col-7"><?php echo $row['enddate']; ?></div>
                <div class="col-4 m-2 p-2">School Supervisor</div><div class="col-7"><?php echo $row['schoolsupervisor']; ?></div>
                <div class="col-4 m-2 p-2">Industry Supervisor</div><div class="col-7"><?php echo $row['industrysupervisor']; ?></div>
               </div>

             </div>
         </div>
    </div>

    </div>
    <script type="text/javascript" rel="stylesheet" src="../jquery/jquery.js"></script>
    <script type="text/javascript" rel="stylesheet" src="../js/bootstrap.min.js"></script>
  </body>
</html>