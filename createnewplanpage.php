<?php
require './includes/common.php';
if (!isset($_SESSION['email'])){
  header('location:index.php');
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
  <body style="padding-top:100px">
    <!---navbar start---->
    <?php
       include './includes/header.php';
     ?>
    <!---navbar end--->
      <!---Login panel--->
      <div class="container-fluid" id="content">
          <div class="row ">
              <div class=" col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                  <div class="panel panel-default ">
                      <div class="panel-heading">
                          <center><h4>Create New Plan</h4></center>
                      </div>
                      <div class="panel-body">
                          <form method="post" action="./includes/createnewplanpage_script.php">
                              <div class="form-group">
                                <label for="budget">Initial Budget</label>
                                <input type="text" class="form-control"  placeholder="Initial Budget(Ex 5000)" name="budget" required="true">
                              </div>
                              <div class="form-group">
                                <label for="no_of_people">How many peoples you want to add in your group?</label>
                                <input type="text" class="form-control" placeholder="No. of People" name="no_of_people" required="true">
                              </div>
                              <button type="submit" class="btn shade btn-block">Next</button>
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
