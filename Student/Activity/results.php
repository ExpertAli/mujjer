<?php
  $filePath='../../connection.php';
  
  if(!file_exists($filePath)){
    echo 'Connection File not found';
  }else{
    include_once $filePath;
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      print_r($_POST);
    }
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
         <!-- <form class="form row justify-content-center pt-2" action="" method="post" >
                   <div class="form-group  col-1">
                      <label class="text-danger  p-3" >Search</label>
                    </div>
                    <div class="form-group  col-3">
                      <input class="form-control"  type="date"  name="search" required>
                  </div>
                  <div class="form-group col-2">
                      <button class="btn btn-outline-danger form-control mt-2" type="submit" name="register">Search</button>
                  </div>
        </form>  -->
     <div class="row">
       
 
         <div class="col-lg-10 offset-md-1 pt-3 text-center">
             <table class="table table-striped table-hover">
                 <thead >
                <tr>
                  <th scope="col">Id</th>
                  <!-- <th scope="col">Student</th> -->
                  <th scope="col">Description</th>
                  <th scope="col">Skills</th>
                  <th scope="col">Media</th>
                  <th scope="col">School Supervisor Remarks</th>
                  <th scope="col">Industry Supervisor Remarks</th>
                  <th scope="col">Assessment</th>
                  <th scope="col">Posted</th>
                    <th scope="col">Action</th>
                </tr>
              </thead><tbody>
             <?php 
                $sql='';
                if($_POST['Assessment'] == 'All'){
                  $sql="SELECT * FROM training WHERE student='".$_SESSION['studentid']."' AND posted LIKE '%".$_POST['date']."%' ORDER BY posted DESC";
                }else{
                  $sql="SELECT * FROM training WHERE student='".$_SESSION['studentid']."' AND posted LIKE '%".$_POST['date']."%' AND assessment='".$_POST['Assessment']."' ORDER BY posted DESC";
                }
              
              $result=$conn->query($sql);
         
              if($result->num_rows > 0){
                   while($row=$result->fetch_assoc()){
                     echo ' <tr>
                  <th scope="row" class="text-primary">'.$row['id'].'</th>
                  
                  <td >'.$row['description'].'</td>
                  <td>'.$row['skills'].'</td>
                  <td>'.$row['media'].'</td>
                  <td >'.$row['schoolremarks'].'</td>
                  <td >'.$row['industryremarks'].'</td>
                  <td >'.$row['assessment'].'</td>
                   <td >'.$row['posted'].'</td>
                  <td >
                      <a href="update.php?id='.$row['id'].'" class="btn  btn-primary">Update</a>
                      
                  </td>
                </tr>';
                 }
                 //<a href="delete.php?delete='.$row['id'].'" class="btn btn-sm btn-danger">Delete</a>

              }else{
                   echo '<div class="alert alert-danger">'.$conn->error.'</div>';
                   echo '<div class="alert alert-danger">Your Activities for '.$_POST['date'].' have not been Assessed</div>';
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