<?php
require './includes/common.php';
if (isset($_SESSION['email'])) {
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
      <!---Login panel--->
      <div class="container" id="content">
          <div class="row ">
              <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12 ">
                  <div class="panel panel-default">
                      <div class="custom-panel-heading">
                        <h3 style="text-align:center">Login</h3>
                      </div>
                      <div class="panel-body">
                          <form method="post" action="./includes/login_submit_script.php">
                              <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control"  placeholder="Email" name="email" required="true">
                              </div>
                              <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" required="true">
                              </div>
                              <button type="submit" class="btn shade1 btn-block">Login</button>
                          </form>
                      </div>
                      <div class="panel-footer">
                        <h6>Don't have an account?<a href="signup.php">Click here to Sign Up</a></h6>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!---login panel end--->

      <!---footer start--->
      <?php
         include './includes/footer.php';
       ?>
       <!---footer end--->
  </body>

</html>
