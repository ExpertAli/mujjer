<?php
  $filePath='../connection.php';
  
  if(!file_exists($filePath)){
    echo 'Connection File not found';
  }else{
    include_once $filePath;
    session_start();
    if(empty($_SESSION['staffid'])){
      header('location:../index.php');
    }else{

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
                 <div class="display-4">School Supervisor Dashboard</div>
                  <div class="lead">This is a Industrial Training and Evaluation System</div>
                 <hr class="my-4">
                 <p>Welcome to Internal Supervisor dashboard</p>
             </div>
         </div>
    </div>

    </div>
    <script type="text/javascript" rel="stylesheet" src="../jquery/jquery.js"></script>
    <script type="text/javascript" rel="stylesheet" src="../js/bootstrap.min.js"></script>
  </body>
</html>