<?php
  $filePath='../../connection.php';
  $feedback='';
  if(!file_exists($filePath)){
    echo 'Connection File not found';
  }else{
    include_once $filePath;
    session_start();
      if(isset($_POST['register'])){
         
          $sql="INSERT INTO report(student,industrysupervisor,summary) VALUES('".$_SESSION['std']['0']."','".$_SESSION['staffid']."','".$_POST['summary']."')";
         
          if($conn->query($sql)){
               $feedback='<div class="alert alert-success mx-5 pl-5">Report Successfully added </div>';
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

    <title>Student | Registration</title>
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
                      <h1 class="text-primary border-bottom border-dark"> STUDENT REPORT</h1> 
                  </div>
                  <div class="form-group  ">
                      <label >Summary</label>
                      <!-- <input class="form-control" type="text" placeholder="John Doe" name="fullname" required> -->
                  <textarea class="form-control" rows="10" name="summary"></textarea>
                  </div>

                  <div class="form-group  ">
                      <!-- <label >School Supervisor Remarks</label> -->
                      <!-- <input class="form-control" type="text" placeholder="John Doe" name="fullname" required> -->
                  <!-- <textarea class="form-control" rows="10" name="summary"></textarea> -->
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