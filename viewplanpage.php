<?php
  require './includes/common.php';
  if (!isset($_SESSION['email'])) {
    header('location: index.php');
  }
  $id=$_SESSION['id'];
  $user_id=$_SESSION['user_id'];
  $sql_query="SELECT * FROM plandetails where  user_id='$user_id' and pid='$id'";
  $sql_query_result=mysqli_query($con,$sql_query) or die(mysqli_error($con));
  $result_array=mysqli_fetch_array($sql_query_result);
  $start_date=date_create($result_array['start_date']);
  $end_date=date_create($result_array['end_date']);
  $_SESSION['title']=$result_array['title'];
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

    <?php
       include './includes/header.php';
       include './includes/function_script.php';
       $remainamount=remain_amount($con,$id,$user_id);
       if(is_null($remainamount)){
         $remainamount=$_SESSION['budgets'];
       }
     ?>

      <div class="container" id="content">
          <div class="row ">
              <div class=" col-md-6 col-xs-8 ">
                  <div class="panel panel-default ">
                     <div class="panel-heading">
                       <h4> <center>
                         <?php echo $result_array['title'] ;?>
                       </center></h4>
                       <h4><div style="float:right;margin-top: -30px;margin-right:-6px;"><span class = "glyphicon glyphicon-user"></span><?php echo " ".$result_array['no_of_people'];?></div></h4>
                     </div>
                      <div class="panel-body">
                        <h5 class="h5_heading_adjust"><strong>Budget:</strong><div style="float:right;"><?php echo "₹ ".$result_array['initial_budget']; ?></div></h5>
                        <h5 class="h5_heading_adjust"><strong>Remaining Amount:</strong><div style="float:right;"><?php text_input($remainamount); ?></div></h5>
                        <h5 class="h5_heading_adjust"><strong>Date:</strong><div style="float:right;"><?php echo date_format($start_date,"jS M")."-".date_format($end_date,"jS M Y"); ?></div></h5>
                      </div>
                  </div>
              </div>
              <div class="col-md-2 col-md-offset-2 col-sm-1">
                  <a href="expenseexpenditurepage.php" class="btn shade btn-lg viewpagebtn-margin">Expense Distribution</a>
              </div>
          </div>

         <div class="row" id="bottom-adjustment">
              <div class="col-md-8">
                     <?php add_items($con,$id); ?>
              </div>
              <div class="col-md-4 col-sm-4" >
                      <div class="panel panel-default pal-adjust ">
                          <div class="panel-heading">
                            <h4 style=text-align:center>Add New Expense</h4>
                          </div>
                          <div class="panel-body">
                              <form method="post" action="./includes/add_new_expense_script.php" enctype="multipart/form-data">
                                  <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input class="form-control"  placeholder="Expense Name" name="title" required="true">
                                  </div>
                                  <div class="form-group">
                                    <label for="date2">Date:</label>
                                    <input type="date" class="form-control" name="date2" required="true" min="<?php echo $result_array['start_date'] ; ?>" max="<?php echo $result_array['end_date']; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="amount_s">Amount:</label>
                                    <input class="form-control"  placeholder="Amount Spent" name="amount_s" required="true">
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control"  placeholder="Expense Name" name="choice" required="true">
                                            <option value="">Choose</option>
                                              <?php person($con,$id); ?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                      <label for="bill">Upload Bill</label>
                                      <input class="form-control" type="file" placeholder="No chosen file" name="uploadedimage" >
                                  </div>
                                  <button type="submit" class="btn shade1 btn-block">Add</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>

      </div>


      <!---footer start--->
      <?php
         include './includes/footer.php';
       ?>
       <!---footer end--->
  </body>

</html>

<?php
function person($con,$id){
  $sql="SELECT * FROM persondetails where trip_id=$id";
  $sql_result=mysqli_query($con,$sql) or die(mysqli_error($con));
  while($row=mysqli_fetch_array($sql_result)){ ?>
    <option value="<?php echo $row['person_name']; ?>"><?php echo $row['person_name'] ;?></option>
<?php  }

}
?>
