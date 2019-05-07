<?php
  $filePath='../connection.php';
  $pwd='';
  if(!file_exists($filePath)){
    echo 'Connection File not found';
  }else{
    include_once $filePath;
    session_start();

    if(isset($_POST['register'])){
         if($_POST['password'] === $_POST['confirmed']){
          $sql="UPDATE staff SET password='".md5($_POST['confirmed'])."' WHERE id='".$_SESSION['staffid']."'";
          if($conn->query($sql)){
            $pwd='<div class="alert alert-success my-5 py-5">You have successfully changed your password</div>';
          }else{
            $pwd='<div class="alert alert-danger my-5 py-5">'.$conn->error.'</div>';
          }

         }else{
             $pwd= '<div class="alert alert-danger my-5 py-5">Passwords do not match! Please try again</div>';
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
    <div class="row  justify-content-center mx-5 pb-2">
        
         <!-- <div class="col-sm-8 offset-md-2 mt-2 text-center bg-light"> -->
           <?php echo $pwd; ?>
             
              <form class="form col-8" action="" method="post">
                <div class="form-group  ">
                      <label ><h1 class="text-primary border-bottom border-dark"> CHANGE PASSWORD</h1> </label>
                      <!-- <input class="form-control" type="text" placeholder="New Password" name="password" value=<?php echo $_SESSION['staffid']; ?> required hidden> -->
                  </div>
                  
                  <div class="form-group  ">
                      <label >New Password</label>
                      <input class="form-control" type="password" placeholder="New Password" name="password" required>
                  </div>
                  <div class="form-group  ">
                      <label >Confirm Password</label>
                      <input class="form-control" type="password" placeholder="Confirm Password" name="confirmed" required>
                  </div>
                  

                  <div class="form-group">
                      <button class="btn btn-primary form-control mt-2" type="submit" name="register">Register</button>
                  </div>
              </form>
<!--     </div>
 -->
    </div>

    </div>
    <script type="text/javascript" rel="stylesheet" src="../jquery/jquery.js"></script>
    <script type="text/javascript" rel="stylesheet" src="../js/bootstrap.min.js"></script>
  </body>
</html>