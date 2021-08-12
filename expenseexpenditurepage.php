<?php
  require './includes/common.php';
  if (!isset($_SESSION['email'])){
    header('location:index.php');
  }
  $id=$_SESSION['id'];
  $user_id=$_SESSION['user_id'];
  $no_of_people=$_SESSION['no_of_people'];
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
       include './includes/function_script.php';
       $remainamount=remain_amount($con,$id,$user_id);
       if(is_null($remainamount)){
         $remainamount=$_SESSION['budgets'];
       }
     ?>
    <!---navbar end--->
      <!---Login panel--->
      <div class="container-fluid" id="content">
          <div class="row " id="bottom-adjustment">
              <div class=" col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4> <center>
                          <?php echo $_SESSION['title'] ;?>
                        </center></h4>
                        <h4><div style="float:right;margin-top: -30px;margin-right:-8px;"><span class = "glyphicon glyphicon-user"></span><?php echo " ".$no_of_people;?></div></h4>
                      </div>
                      <div class="panel-body">
                        <h6 class="h5_heading_adjust"><strong>Initial Budget</strong><div style="float:right;"><?php echo $_SESSION['budgets']; ?></div></h6>
                        <?php
                            $total_amount=Individual_amount_spent($con,$id);
                          ?>
                        <h6 class="h5_heading_adjust"><strong>Total amount spend</strong><div style="float:right;"><?php echo "₹ ".$total_amount; ?></div></h6>
                        <?php $individual_share=$total_amount/$no_of_people; ?>
                        <h6 class="h5_heading_adjust"><strong>Remaining Amount:</strong><div style="float:right;"><?php text_input($remainamount); ?></strong></div></h6>
                        <h6 class="h5_heading_adjust"><strong>Individual Shares</strong><div style="float:right;"><?php echo "₹ ".$individual_share; ?></div></h6>
                        <?php
                           Individual_share($con,$individual_share,$id);
                         ?>
                          <center>
                            <a href="viewplanpage.php" class="btn shade btn-md" style="text-decoration:none;"><span class="glyphicon glyphicon-arrow-left"></span> Go Back</a>
                          </center>
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
