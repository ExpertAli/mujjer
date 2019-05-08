<?php
  $filePath='../../connection.php';
  $feedback='';
  if(!file_exists($filePath)){
    echo 'Connection File not found';
  }else{
    include_once $filePath;
    session_start();
      if(isset($_POST['register'])){
         
          $sql="INSERT INTO industry(student,type,company,location,email,phone_number,startdate,enddate,industrysupervisor,schoolsupervisor) VALUES('".$_POST['student']."','".$_POST['type']."','".$_POST['company']."','".$_POST['location']."','".$_POST['email']."','".$_POST['phonenumber']."','".$_POST['Start']."','".$_POST['End']."','".$_POST['industry']."','".$_SESSION['staffid']."')";
         
          if($conn->query($sql)){
               $feedback='<div class="alert alert-success mx-5 pl-5">Successfully inserted Organizarion Details </div>';
          }else{
              $feedback='<div class="alert alert-danger mx-5 pl-5">'.$conn->error.'</div>';
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


    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <title>Training | Registration</title>
  </head>
  <body>
    <div class="container-fluid p-3">
<!--        navbar-->
<?php include "../navbar.php"; ?>
<!--        <div class="row"></div>-->
<?php echo $feedback; ?>
     <div class="row  justify-content-center mx-5 pb-2">
        
         <!-- <div class="col-sm-8 offset-md-2 mt-2 text-center bg-light"> -->
           
             
              <form class="form col-8" action="" method="post">
                <div class="form-group  text-center">
                      <h1 class="text-primary border-bottom border-dark"> Industrial Training REGISTRATION</h1>
                  </div>
                  <div class="form-group  ">
                      <label >Student ID</label>
                      <input class="form-control" type="text" placeholder=" Student ID" name="student" required>
                  </div>
                  <div class="form-group">
                    <label>Training Type</label>
                    <select name="type" class="form-control">
                        <option class="dropdown-item">Attachment</option>
                        <option class="dropdown-item">Internship</option>
                       <!-- <option class="dropdown-item">Assessed</option> -->
                      </select>
                    </div>

                  <div class="form-group  ">
                      <label >Company Name</label>
                      <input class="form-control" type="text" placeholder="Company Name" name="company" required>
                  </div>
                  
  
                  <div class="form-group  ">
                      <label >Phone Number</label>
                    <input class="form-control" type="number" placeholder="+25470124536" name="phonenumber" required>
                  </div>
                  
                  <div class="form-group  ">
                      <label >Email</label>
                      <input class="form-control" type="email" placeholder="example@gmail.com" name="email" required>
                  </div>
                  
                   <div class="form-group  ">
                      <label >Location</label>
                      <input class="form-control" type="text" placeholder="Location" name="location" required>
                  </div>
                   <div class="form-group  ">
                      <label >Start Date</label>
                      <input class="form-control" type="date" placeholder="Start Date" name="Start" required>
                  </div>
                   <div class="form-group  ">
                      <label >End Date</label>
                      <input class="form-control" type="date" placeholder="End Date" name="End" required>
                  </div>
                  
                  <div class="form-group  ">
                      <label >Industry Supervisor ID</label>
                      <input class="form-control" type="text" placeholder="Industry Supervisor ID" name="industry" required>
                  </div>
                  
                  <div class="form-group">
                      <button class="btn btn-primary form-control mt-2" type="submit" name="register">Register</button>
                  </div>
              </form>
<!--     </div>
 -->
    </div>
      </div>
    <script type="text/javascript" rel="stylesheet" src="../../jquery/jquery.js"></script>
    <script type="text/javascript" rel="stylesheet" src="../../js/bootstrap.min.js"></script>
  </body>
</html>