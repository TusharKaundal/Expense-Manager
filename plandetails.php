<?php
require './includes/common.php';
if (!isset($_SESSION['email'])){
  header('location:index.php');
}
$budget=$_SESSION['budgets'];
$no_of_people=$_SESSION['no_ofpeople'];
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
      <div class="container-fluid" id="content">
          <div class="row " id="bottom-adjustment">
              <div class=" col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12 ">
                  <div class="panel panel-default ">
                      <div class="panel-body">
                          <form method="post" action="./includes/plandetails_script.php">
                              <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" placeholder="Enter Title(Ex:Trip to Santorini)" name="title" required="true">
                              </div>
                              <div class="row">
                                  <div class="form-group col-sm-6 ">
                                    <label for="start">From</label>
                                    <input type="date" class="form-control" name="start" required="true">
                                  </div>
                                  <div class=" form-group col-sm-6 " >
                                    <label for="end">To</label>
                                    <input type="date"  class="form-control" name="end" required="true">
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-sm-8 ">
                                    <label for="budget">Initial Budget</label>
                                    <input type="text" class="form-control" name="budget" value="<?php echo $budget;?>" readonly>
                                  </div>
                                  <div class="form-group col-sm-4 ">
                                    <label for="no_of_people">No. of people</label>
                                    <input type="text" class="form-control" name="no_of_people" required="true" value="<?php echo $no_of_people ;?>" readonly>
                                  </div>
                              </div>
                              <?php for($i=1;$i<=$no_of_people;$i++) { ?>
                              <div class="form-group">
                                    <label for=""><?php echo "Person ".$i ; ?></label>
                                    <input type="text" class="form-control" placeholder="<?php echo "Person ".$i." name"; ?>" name="<?php echo "tag$i" ;?>" required="true">
                              </div>
                            <?php }?>
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
