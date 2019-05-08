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
                        $slct="SELECT * FROM industry WHERE id='".$id."'";
                        $result=$conn->query($slct) or die($conn->error);
                        if($result->num_rows > 0){
                            $row=$result->fetch_assoc();
                          
                        }
                    }
 
      }elseif($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_POST['update'])){
                
                $sql="UPDATE industry SET student='".$_POST['student']."',company='".$_POST['company']."',email='".$_POST['email']."',phone_number='".$_POST['phonenumber']."',location='".$_POST['location']."',startdate='".$_POST['Start']."',enddate='".$_POST['End']."' WHERE id='".$_POST['id']."'";
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
    <div class="container-fluid bg-secondary p-3">
<!--        navbar-->
<?php include "../navbar.php"; ?>
<!--        <div class="row"></div>-->
     <div class="row justify-content-center mx-5 pb-2" >
        
      
              <form class="form col-8" action="" method="post">
                <div class="form-group text-center ">
                      <h1 class="text-primary border-bottom border-dark"> Edit Training Records</h1> 
                  </div>
                   <div class="form-group  ">
                      <label >Training ID</label>
                      <input class="form-control" type="text"  name="id" value="<?php echo $row['id']; ?>" readonly>
                  </div>
                   <div class="form-group  ">
                      <label >Student ID</label>
                      <input class="form-control" type="text"  name="student" value="<?php echo $row['student']; ?>"required>
                  </div>
                  <div class="form-group  ">
                      <label >Company Name</label>
                      <input class="form-control" type="text" value="<?php echo $row['company']; ?>" name="company" required>
                  </div>
                  
  
                  <div class="form-group  ">
                      <label >Phone Number</label>
                    <input class="form-control" type="number" value="<?php echo $row['phone_number']; ?>" name="phonenumber" required>
                  </div>
                  
                  <div class="form-group  ">
                      <label >Email</label>
                      <input class="form-control" type="email" value="<?php echo $row['email']; ?>" name="email" required>
                  </div>
                  
                   <div class="form-group  ">
                      <label >Location</label>
                      <input class="form-control" type="text" value="<?php echo $row['location']; ?>" name="location" required>
                  </div>
                   <div class="form-group  ">
                      <label >Start Date</label>
                      <input class="form-control" type="date" value="<?php echo $row['startdate']; ?>" name="Start" required>
                  </div>
                   <div class="form-group  ">
                      <label >End Date</label>
                      <input class="form-control" type="date" value="<?php echo $row['enddate']; ?>" name="End" required>
                  </div>
                  
                  <div class="form-group  ">
                      <label >Industry Supervisor ID</label>
                      <input class="form-control" type="text" value="<?php echo $row['industrysupervisor']; ?>" name="industry" required>
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