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
                        $slct="SELECT * FROM report WHERE id='".$id."'";
                        $result=$conn->query($slct) or die($conn->error);
                        if($result->num_rows > 0){
                            $row=$result->fetch_assoc();
                          
                        }
                    }
 
      }elseif($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_POST['update'])){
                
                $sql="UPDATE report SET summary='".$_POST['summary']."' WHERE id='".$_POST['id']."'";
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
     <div class="row justify-content-center mx-5 pb-2" style="background: #ccc;">
        
      
              <form class="form col-8" action="" method="post">
                <div class="form-group text-center ">
                      <h1 class="text-primary border-bottom border-dark"> Edit Student Report </h1> 
                  </div>
                   
                  <div class="form-group  ">
                      <label >Summary</label>
                      <input class="form-control" type="text"  name="id" value="<?php echo $row['id']; ?>" required hidden>
                  <textarea class="form-control" rows="10" name="summary"><?php echo $row['summary']; ?></textarea>
                  </div>

                  <div class="form-group  ">
                      <!-- <label >School Supervisor Remarks</label> -->
                      <!-- <input class="form-control" type="text" placeholder="John Doe" name="fullname" required> -->
                  <!-- <textarea class="form-control" rows="10" name="summary"></textarea> -->
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