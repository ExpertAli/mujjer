<?php
  $filePath='../../connection.php';
  $feedback='';
  if(!file_exists($filePath)){
    echo 'Connection File not found';
  }else{
    include_once $filePath;
    session_start();
    
      if(isset($_POST['register'])){
         $target_dir="../../media/";
         $imgName=$_FILES['file']['name'];
         $imgTemp=$_FILES['file']['tmp_name'];
         $imgSize=$_FILES['file']['size'];
         $allowExt=array('jpeg','jpg','png','gif','mp4');
         $target_file = $target_dir . basename($_FILES["file"]["name"]);
         $imgExt=pathinfo($imgName,PATHINFO_EXTENSION);

         if(in_array($imgExt,$allowExt)){
          if(move_uploaded_file($imgTemp, $target_file)){
                 $sql="INSERT INTO training(student,media,extension,description,skills) VALUES('".$_SESSION['studentid']."','".$imgName."','".$imgExt."','".$_POST['Description']."','".$_POST['Skills']."')";
             
                if($conn->query($sql)){
                     $feedback='<div class="alert alert-success mx-5 pl-5">Successfully added new Activity</div>';
                }else{
                    $feedback='<div class="alert alert-danger mx-5 pl-5">'.$conn->error.'</div>';
                }
            }else{
              $feedback='<div class="alert alert-danger mx-5 pl-5">file failed to upload &nbsp;'.$conn->error.'</div>';
            }
         }else{
              $feedback='<div class="alert alert-danger mx-5 pl-5">File not allowed &nbsp;'.$conn->error.'</div>';
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
           
             
              <form class="form col-8" action="" method="post" enctype="multipart/form-data">
                <div class="form-group  ">
                      <label ><h1 class="text-primary border-bottom border-dark"> NEW TASK</h1> </label>
                  </div>
                  <div class="form-group  ">
                      <label >Description </label>
                   <!--    <input class="form-control" type="text" placeholder="John Doe" name="fullname" required> -->
                   <textarea class="form-control" rows="5" placeholder="I did this and that" name="Description" ></textarea>
                  </div>
                  <div class="form-group  ">
                      <label >Skills Earned</label>
                     <!--  <input class="form-control" type="date" placeholder="Date of Birth" name="birthdate" required> -->
                      <textarea class="form-control text-primary" rows="5" placeholder="I learnt to do this and that" name="Skills"></textarea>
                  </div>
      
                  <div class="form-group  ">
                      <label >Picture or Video <span class="text-muted pl-2">Acceptable Extension : Mp4, gif,jpg,jpeg,png </span></label>
                      <input class="form-control" type="file" name="file" value="Upload" >
                  </div>
                  <!-- 
                   <div class="form-group  ">
                      <label >Phone Number</label>
                      <input class="form-control" type="number" placeholder="+254700100202" name="phone" required>
                  </div>
                  
                   -->

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