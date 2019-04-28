<?php
  $filePath='../../connection.php';
  $fdb="";
  
  if(!file_exists($filePath)){
    echo 'Connection File not found';
  }else{
    include_once $filePath;
      if($_SERVER['REQUEST_METHOD']=='GET'){
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        
                        $slct="DELETE * FROM student WHERE id='".$id."' LIMIT 1";
                       echo $slct;
                        if($conn->query($slct)){
                             $fdb='<div class="alert alert-success mx-5 mb-0 pl-5">Successfully Deleted 1 record </div>';
                          
                        }else{
                             $fdb='<div class="alert alert-danger mx-5 pl-5">'.$conn->error.'</div>';
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

    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <title>Delete | Student</title>
  </head>
  <body>
    <div class="container-fluid p-3">
<!--        navbar-->
<?php include "../navbar.php"; ?>
<!--        <div class="row"></div>-->
     <div class="row" >
        
         <div class="col-sm-8 offset-md-2 text-center">
           
           <div class="col-sm-8 offset-md-2 text-center">
             <div class="jumbotron">
                 <div class="display-4">Delete Student</div>
                  <div class="lead">This is a Industrial Training and Evaluation System</div>
                 <hr class="my-4">
                 <p><?php echo $fdb; ?></p>
             </div>
         </div>
             
         </div>
    </div>

    </div>
    <script type="text/javascript" rel="stylesheet" src="../../jquery/jquery.js"></script>
    <script type="text/javascript" rel="stylesheet" src="../../js/bootstrap.min.js"></script>
  </body>
</html>