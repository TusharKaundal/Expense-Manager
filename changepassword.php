<?php
require './includes/common.php';
if (!isset($_SESSION['email'])) {
  header('location: index.php');
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
              <div class="col-lg-4 col-lg-offset-4 col-xs-6 col-xs-offset-3">
                  <div class="panel panel-default ">
                      <div class="custom-panel-heading">
                        <h4 style="text-align:center;margin:0;">Change Password</h4>
                      </div>
                      <div class="panel-body">
                          <form method="post" action="./includes/change_password_script.php">
                              <div class="form-group">
                                <label for="old_password">Old Password</label>
                                <input type="password" class="form-control"  placeholder="Old Password" name="old_password" required="true">
                              </div>
                              <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control" placeholder="New Password(Min. 8 characters)" name="new_password" required="true">
                              </div>
                              <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Re-type Password" name="confirm_password" required="true">
                              </div>
                              <button type="submit" class="btn shade1 btn-block">Change</button>
                          </form>
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
