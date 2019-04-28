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
        <div class="row justify-content-center text-primary"><h1>Staff Records</h1></div>
     <div class="row">
        
         <div class="col-lg-10 offset-md-1 pt-3 text-center">
             <table class="table table-striped table-hover">
                 <thead >
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Fullname</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Date of Birth</th>
                  
                  <th scope="col">Phone Number</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                  <th scope="col">Action</th>
                </tr>
              </thead><tbody>
             <?php 
                
              $sql="SELECT * FROM staff";
              $result=$conn->query($sql);
         
              if($result->num_rows > 0){
                   while($row=$result->fetch_assoc()){
                     echo ' <tr>
                  <th scope="row" class="text-primary">'.$row['id'].'</th>
                  <td >'.$row['fullname'].'</td>
                  <td >'.$row['sex'].'</td>
                  <td>'.$row['birthdate'].'</td>
                  <td >'.$row['phonenumber'].'</td>
                  <td >'.$row['email'].'</td>
                  <td >'.$row['role'].'</td>
                  <td >
                      <a href="update.php?id='.$row['id'].'" class="btn btn-primary">Update</a>
                      <a href="delete.php?delete='.$row['id'].'" class="btn btn-danger">Delete</a>
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