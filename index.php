<?php
require './includes/common.php';
if (isset($_SESSION['email'])){
  header('location:homepage.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="./css/style.css">


    <meta charset="utf-8">


    <title></title>
  </head>
  <body>
    <!---navbar start---->
    <?php
       include './includes/header.php';
     ?>
    <!---navbar end--->

    <!---background banner--->
          <div class="banner_image" >
                          <div class="container" >
                            <center>
                              <div class="banner_content">
                                <h2>We help you control your budget</h2><br>
                                <a href="login.php" type="button" class="btn shade1 btn-lg" >Start Today</a>
                              </div>
                            </center>
                          </div>
          </div>
    <!---background banner end--->


          <!---footer start--->
          <?php
             include './includes/footer.php';
           ?>
           <!---footer end--->
  </body>
</html>
