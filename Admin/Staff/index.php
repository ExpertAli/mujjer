<?php
  $filePath='../../connection.php';
  $feedback='';
  if(!file_exists($filePath)){
    echo 'Connection File not found';
  }else{
    include_once $filePath;
      if(isset($_POST['register'])){
         
          $sql="INSERT INTO staff(fullname,birthdate,sex,email,password,phonenumber,role) VALUES('".$_POST['fullname']."','".$_POST['birthdate']."','".$_POST['sex']."','".$_POST['email']."','".md5($_POST['password'])."','".$_POST['phone']."','".$_POST['role']."')";
         
          if($conn->query($sql)){
               $feedback='<div class="alert alert-success mx-5 pl-5">Successfully added '.strtoupper($_POST['fullname']).' </div>';
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

    <title>Staff | Registration</title>
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
                      <h1 class="text-primary border-bottom border-dark"> STAFF REGISTRATION</h1> 
                  </div>
                  <div class="form-group  ">
                      <label >Fullname</label>
                      <input class="form-control" type="text" placeholder="John Doe" name="fullname" required>
                  </div>
                  <div class="form-group  ">
                      <label >Date of Birth</label>
                      <input class="form-control" type="date" placeholder="Date of Birth" name="birthdate" required>
                  </div>
                  
  
                  <div class="form-group  ">
                      <label >Gender</label>
                      
                      <select name="sex" class="form-control" required>
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                  </div>
                  
                  <div class="form-group  ">
                      <label >Email</label>
                      <input class="form-control" type="email" placeholder="example@gmail.com" name="email" required>
                  </div>
                  
                   <div class="form-group  ">
                      <label >Phone Number</label>
                      <input class="form-control" type="number" placeholder="+254700100202" name="phone" required>
                  </div>
                  
                  <div class="form-group  ">
                      <label >Password</label>
                      <input class="form-control" type="password" placeholder="Password" name="password" required>
                  </div>
                  <div class="form-group  ">
                      <label >Role</label>
                      <select name="role" class="form-control" required>
                        <option class="dropdown-item">Choose option</option>
                        <option>School_Supervisor</option>
                        <option>Industrial_Supervisor</option>
                        <option>Admin</option>
                      </select>
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