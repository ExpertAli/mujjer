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
                        $slct="SELECT * FROM training WHERE id='".$id."'";
                        $result=$conn->query($slct) or die($conn->error);
                        if($result->num_rows > 0){
                            $row=$result->fetch_assoc();
                          
                        }
                    }
 
      }elseif($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_POST['update'])){
                
                $sql="UPDATE training SET industryremarks='".$_POST['industry']."' WHERE id='".$_POST['id']."'";
                if($conn->query($sql)){
                     $fdb='<div class="alert alert-success mx-5 mb-0 pl-5">Successfully updated record </div>';
                    header('location:index.php');
                }else{
                   $fdb='<div class="alert alert-danger mx-5 pl-5">'.$conn->error.'</div>';
                     header("location:index.php");
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
    <div class="container-fluid  p-3">
<!--        navbar-->
<?php include "../navbar.php"; ?>
<!--        <div class="row"></div>-->
     <div class="row justify-content-center mx-5 pb-2" >
      
        
      
              <form class="form col-8" action="" method="post" enctype="multipart/form-data">
                <div class="form-group  text-center">
                      <h1 class="text-primary border-bottom border-dark"> Edit Activity Records</h1> 
                  </div>
                   
                  <div class="form-group mb-2" style="height: 400px;">
                    <?php
                    if(isset($row['extension']) && ($row['extension'] == 'mp4')){
                      echo ' <div class="embed-responsive embed-responsive-16by9"><video  controls><source src="../../media/'.$row['media'].'" type="video/mp4">Your browser does not support the video tag.</video></div> ';

                    }else{
                      echo '<img src="../../media/'.$row['media'].'" class="img-fluid" alt="...">';
                    } 
                    ?>
                    
                  </div>
                  <div class="form-group  mt-5">
                      <label >Activity ID</label>
                      <input class="form-control" type="text"  name="id" value="<?php echo $row['id']; ?>" readonly>
                  </div>
                  <div class="form-group  mb-2">
                      <label >Description </label>
                   <!--    <input class="form-control" type="text" placeholder="John Doe" name="fullname" required> -->
                   <textarea class="form-control " rows="5" readonly name="Description"><?php echo $row['description']; ?></textarea>
                  </div>
                  <div class="form-group  ">
                      <label >Skills Earned</label>
                     <!--  <input class="form-control" type="date" placeholder="Date of Birth" name="birthdate" required> -->
                      <textarea class="form-control " rows="5" readonly name="Skills"><?php echo $row['skills']; ?></textarea>
                  </div>
                  <div class="form-group  ">
                      
                     <?php if(!empty($row['schoolremarks'])){
                      echo '<label >School Supervisor Remarks</label><textarea  readonly class="form-control  text-success" rows="5"  name="school">'.$row['schoolremarks'].'</textarea>';

                     } ?>
                  </div>
                  <!-- remarks here -->
                  <div class="form-group  ">
                      <label >Industry Supervisor Remarks</label><textarea   class="form-control text-primary" rows="5"  name="industry"><?php echo $row['industryremarks']; ?></textarea>
                     
                  </div>
                  
      
                  <!-- <div class="form-group  ">

                      <label >Picture or Video</label>
                      <input class="form-control" type="file" name="file" value="Upload" >
                  </div> -->
                  
                  

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