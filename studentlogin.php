<?php
  $filePath='connection.php';
  $error['student']='';
  if(!file_exists($filePath)){
    echo 'Connection File not found';
  }else{
    include_once $filePath;
    session_start();
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if(isset($_POST['login']) && !empty($_POST['login'])){
        //print_r($_POST);
        $sql="SELECT * FROM student WHERE email='".$_POST['email']."' AND password='".md5($_POST['Password'])."'";
        $result=$conn->query($sql) or die($conn->error);
        if($result->num_rows == 1){
          $row=$result->fetch_assoc();
         // print_r($row);
          $_SESSION['studentid']=$row['id'];
          header("location:Student/index.php");

        }else{
          $error['student']= '<div class="alert alert-danger px-5 py-2 mx-5">Incorrect Email and Password! Please Try Again</div>';
        }

      }else{}

    }else{

    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Industrial Training M&E System</title>
  </head>
  <body>
    <div class="container-fluid px-3" style="min-height: 100%">
      <div class="row  justify-content-center  bg-dark ">
        <h1 class=" text-primary my-0 p-3">Industrial Training Monitoring and Evaluation System</h1>
      </div>
      <div class="row  justify-content-left  bg-light py-2 ml-3">
        <a class="" href="index.php"> &larr;  Back</a>
      </div>
      <div class="row text-center bg-light py-3">
         
         <h2 class="col text-danger ">Student Login Page</h2>
      </div>
      <div class="row justify-content-center " >
        <form class="form col-6" action="" method="POST">
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
          </div>
           <div class="form-group">
            <label>Password</label>
            <input type="Password" name="Password" class="form-control" placeholder="Password">
          </div>
          <div class="form-group">
            <input type="submit" name="login" value="Login" class="btn btn-lg btn-primary" >
          </div>
        </form>
      </div>
      <?php echo $error['student']; ?>
    
     </div>
     
       

   
    <script type="text/javascript" rel="stylesheet" src="jquery/jquery.js"></script>
    <script type="text/javascript" rel="stylesheet" src="js/bootstrap.min.js"></script>
  </body>
</html>