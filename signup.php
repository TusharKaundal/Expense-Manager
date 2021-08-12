<?php
require './includes/common.php';
if (isset($_SESSION['email'])){
  header('location:homepage.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="./css/style.css">

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>
  </head>
  <body style="padding-top:50px">
    <!---navbar start---->
    <?php
       include './includes/header.php';
     ?>
    <!---navbar end--->

  <!---signup form container--->
    <div class="container" id="content">
           <div class="row">
                   <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
                       <div class="panel panel-default">
                           <div class="custom-panel-heading ">
                               <center>
                                 <h2>Sign up</h2>
                               </center>
                           </div>
                           <div class="panel-body">
                               <form method="post" action="./includes/signup_script.php">
                                   <div class="form-group">
                                       <label for="name">Name:</label>
                                       <input type="text" class="form-control" placeholder="Name" name="name"  required = "true">
                                   </div>
                                   <div class="form-group">
                                       <label for="email">Email:</label>
                                       <input type="email" class="form-control"  placeholder="Enter Valid Email"  name="email" required = "true">
                                   </div>
                                   <div class="form-group">
                                       <label for="password">Password:</label>
                                       <input type="password" class="form-control" placeholder="Enter Password(Min. 8 characters)" name="password" required = "true">
                                   </div>
                                   <div class="form-group">
                                     <label for="contact">Phone Number:</label>
                                       <input type="text" class="form-control"  placeholder="Enter Valid Phone Number (Ex:8448444853)" name="contact" required = "true">
                                   </div>
                                   <button type="submit" name="submit" class="btn shade1 btn-block">Submit</button>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!---signup form container end--->


           <!---footer start--->
           <?php
              include './includes/footer.php';
            ?>
            <!---footer end--->
       </body>

  </body>
</html>
