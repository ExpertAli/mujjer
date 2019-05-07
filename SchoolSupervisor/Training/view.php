<?php
  $filePath='../../connection.php';
  
  if(!file_exists($filePath)){
    echo 'Connection File not found';
  }else{
    include_once $filePath;
  }
?>
<doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <title>Records | Industrial Training M&E System</title>
  </head>
  <body>
    <div class="container-fluid p-3">
<!--        navbar-->
        <?php  include "../navbar.php"; ?>
        <div class="row justify-content-center text-primary"><h1>Industrial Training Records</h1></div>
     <div class="row">
        
         <div class="col-lg-10 offset-md-1 pt-3 text-center">
             <table class="table table-striped table-hover">
                 <thead >
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Student</th>
                  <th scope="col">Company</th>
                  <th scope="col">Location</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Start Date</th>
                  <th scope="col">End Date</th>
                  <th scope="col">Industry Supervisor</th>
                  <th scope="col">Action</th>
                </tr>
              </thead><tbody>
             <?php 
                
              $sql="SELECT * FROM industry";
              $result=$conn->query($sql);
         
              if($result->num_rows > 0){
                   while($row=$result->fetch_assoc()){
                     echo ' <tr>
                  <th scope="row" class="text-primary">'.$row['id'].'</th>
                  <td >'.$row['student'].'</td>
                  <td >'.$row['company'].'</td>
                  <td>'.$row['location'].'</td>
                  <td >'.$row['email'].'</td>
                  <td >'.$row['phone_number'].'</td>
                  <td >'.$row['startdate'].'</td>
                  <td >'.$row['enddate'].'</td>
                  <td >'.$row['industrysupervisor'].'</td>
                  <td >
                      <a href="update.php?id='.$row['id'].'" class="btn btn-sm btn-primary">Update</a>
                      <a href="delete.php?delete='.$row['id'].'" class="btn btn-sm btn-danger">Delete</a>
                  </td>
                </tr>';
                 }

              }else{
                   echo '<div class="alert alert-danger">'.$conn->error.'</div>';
                  //couldnt fetch records
              }
               
                
               ?>
                  </tbody>
                  </table>
         </div>
    </div>

    </div>
    <script type="text/javascript" rel="stylesheet" src="../../jquery/jquery.js"></script>
    <script type="text/javascript" rel="stylesheet" src="../../js/bootstrap.min.js"></script>
  </body>
</html>