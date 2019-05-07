<?php
  $filePath='../../connection.php';
  
  if(!file_exists($filePath)){
    echo 'Connection File not found';
  }else{
    include_once $filePath;
      
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
          <!-- form -->
                  <form class="form col-8" action="results.php" method="post" enctype="multipart/form-data">
                    <div class="form-group"><h1 class="text-primary">SEARCH </h1></div>
                    <div class="form-group">
                      <label>Date</label>
                      <input class="form-control" type="Date" name="date">
                    </div>

                    <div class="form-group">
                      <label>Assessment</label>
                      
                      <select name="Assessment" class="form-control">
                        <option class="dropdown-item">All</option>
                        <option class="dropdown-item">Pending</option>
                        <option class="dropdown-item">Assessed</option>
                      </select>
                    </div>
                      

                      <div class="form-group">
                          <button class="btn btn-danger" type="submit" name="search">Search</button>
                      </div>
                  </form>
        

        </div>
      </div>
    <script type="text/javascript" rel="stylesheet" src="../../jquery/jquery.js"></script>
    <script type="text/javascript" rel="stylesheet" src="../../js/bootstrap.min.js"></script>
  </body>
</html>