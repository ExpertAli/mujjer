<?php
  $filePath='../../connection.php';
  
  if(!file_exists($filePath)){
    echo 'Connection File not found';
  }else{
    include_once $filePath;
      if($_SERVER['REQUEST_METHOD']=='GET'){
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        //$error['confirm']=" ";
                        $slct="SELECT * FROM student WHERE id='".$id."'";
                        $result=$conn->query($slct) or die($conn->error);
                        if($result->num_rows > 0){
                            $row=$result->fetch_assoc();
                          
                        }
                    }
 
      }elseif($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_POST['update'])){
                
                $sql="UPDATE student SET fullname='".$_POST['fullname']."',sex='".$_POST['sex']."',email='".$_POST['email']."',phonenumber='".$_POST['phone']."',birthdate='".$_POST['birthdate']."',programme='".$_POST['programme']."',course='".$_POST['course']."' WHERE id='".$_POST['id']."'";
                if($conn->query($sql)){
                     $fdb='<div class="alert alert-success mx-5 mb-0 pl-5">Successfully updated record </div>';
                    header('location:view.php');
                }else{
                   $fdb='<div class="alert alert-danger mx-5 pl-5">'.$conn->error.'</div>';
                     header("location:view.php");
                }
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

    <title>Client | Registration</title>
  </head>
  <body>
    <div class="container-fluid y p-3">
<!--        navbar-->
<?php include "../navbar.php"; ?>
<!--        <div class="row"></div>-->
     <div class="row justify-content-center mx-5 pb-2" >
        
      
              <form class="form col-8" action="" method="post">
                <div class="form-group  text-center p-2">
                      <h1 class="text-primary border-bottom border-dark "> EDIT STUDENT RECORDS </h1> 
                  </div>
                   <div class="form-group  ">
                      <label >Staff ID</label>
                      <input class="form-control" type="text"  name="id" value="<?php echo $row['id']; ?>" readonly>
                  </div>
                  <div class="form-group  ">
                      <label >Fullname</label>
                      <input class="form-control" type="text"  name="fullname" value="<?php echo $row['fullname']; ?>">
                  </div>
                  
                  
  
                  <div class="form-group  ">
                      <label >Gender</label>
                      <?php 
                        switch ($row['sex']){
                          case 'Male': echo '<select name="sex" class="form-control" required><option selected>Male</option><option>Female</option></select>';
                          break;
                          case 'Female': echo '<select name="sex" class="form-control" required><option selected>Female</option><option >Male</option></select>';
                          break;
                          // default: echo '<select name="sex" class="form-control" required><option >Male</option><option >Female</option></select>';
                       } ?>
                  </div>
                  
                  <div class="form-group  ">
                      <label >Email</label>
                      <input class="form-control" type="email" name="email" value="<?php echo $row['email']; ?>">
                  </div>
                  
                   <div class="form-group  ">
                      <label >Phone Number</label>
                      <input class="form-control" type="number"  name="phone" value="<?php echo $row['phonenumber']; ?>">
                  </div>
                  <div class="form-group  ">
                      <label >Date of Birth</label>
                      <input class="form-control" type="date" name="birthdate" value="<?php echo $row['birthdate']; ?>">
                  </div>
                  <div class="form-group  ">
                      <label >Programme</label>
                      <?php 
                        switch ($row['programme']){
                          case 'Diploma': echo '<select name="programme" class="form-control" required><option selected>Diploma</option><option>Degree</option></select>';
                          break;
                          case 'Degree': echo '<select name="programme" class="form-control" required><option >Diploma</option><option selected>Degree</option></select>';
                          break;
                       } ?>
                  </div>

                  <div class="form-group  ">
                      <label >Course</label>
                      <?php 
                        switch ($row['course']){
                          case 'Computer Science': echo '<select name="course" class="form-control" required><option selected>Computer Science</option><option>Nursing</option><option>Business Administration</option></select>';
                          break;
                          case 'Nursing': echo '<select name="course" class="form-control" required><option >Computer Science</option><option selected>Nursing</option><option>Business Administration</option></select>';
                          break;
                          case 'Business Administration': echo '<select name="course" class="form-control" required><option selected>Computer Science</option><option>Nursing</option><option selected>Business Administration</option></select>';
                          break;
                       } ?>
                  </div>
                  

                  <div class="form-group">
                      <button class="btn btn-danger" type="submit" name="update">Update</button>
                  </div>
              </form>
    

    </div>
      </div>
    <script type="text/javascript" rel="stylesheet" src="../../jquery/jquery.js"></script>
    <script type="text/javascript" rel="stylesheet" src="../../js/bootstrap.min.js"></script>
  </body>
</html>