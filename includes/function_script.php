<?php
// add panel box to viewplanpage 
function add_items($con,$id){
  $sql_query="SELECT * FROM new_expense_details where trip_id='$id' ";
  $sql_query_result=mysqli_query($con,$sql_query) or die(mysqli_error($con));
  if(mysqli_num_rows($sql_query_result)>0){
    while($result_array=mysqli_fetch_array($sql_query_result)){
      $date=date_create($result_array['upload_date']);
  ?>  <div class="col-lg-5 col-md-6 col-sm-6" style="margin-left:-15px;">
    <div class="panel panel-default pal-adjust">
       <div class="panel-heading">
         <h4><center>
              <?php echo $result_array['expense_name'] ;?>
         </center>
       </h4>
       </div>
       <div class="panel-body">
           <h5 class="h5_heading_adjust"><strong>Amount</strong><div style="float:right;"><?php echo $result_array['amount_spent']; ?></div></h5>
           <h5 class="h5_heading_adjust"><strong>Paid by</strong><div style="float:right;"><?php echo $result_array['person'] ?></div></h5>
           <h5 class="h5_heading_adjust"><strong>Paid on</strong><div style="float:right;"><?php echo date_format($date,"jS M-Y"); ?></div></h5>
           <?php if(is_null($result_array['img_dir'])){
            echo "<center style=\"color:#337ab7;\">You Don't have bill</center>";
         }else{
           echo "<center><a href=\"".$result_array['img_dir']."\"target=\"_blank\">Show bill</a></center>";
         } ?>
       </div>
    </div>

  </div>


 <?php
    }
  }
}
?>
<?php
// add panel box to homepage 
function addtag_items($con,$user_id){
  $sql_query="SELECT * FROM plandetails where user_id='$user_id' ";
  $sql_query_result=mysqli_query($con,$sql_query) or die(mysqli_error($con));
  while($result_array=mysqli_fetch_array($sql_query_result)){
    $start_date=date_create($result_array['start_date']);
    $end_date=date_create($result_array['end_date']);
  ?>
    <div class="col-lg-3 col-md-4 col-sm-5">
      <div class="panel panel-default pal-adjust">
         <div class="panel-heading">
            <h4> <center>
              <?php echo $result_array['title'] ;?>
            </center></h4>
            <h4><div style="float:right;margin-top: -30px;margin-right:-6px;"><span class = "glyphicon glyphicon-user"> </span> <?php echo $result_array['no_of_people'] ;?></div></h4>
         </div>
         <div class="panel-body">
             <h5 class="h5_heading_adjust"><strong>Budget:</strong><div style="float:right;"><?php echo $result_array['initial_budget']; ?></div></h5>
             <h5 class="h5_heading_adjust"><strong>Date:</strong><div style="float:right;"><?php echo date_format($start_date,"jS M")." - ".date_format($end_date,"jS M Y"); ?></div></h5>
             <form action="./includes/idsession_script.php" method="post">
               <button type="submit" name="button" class="btn shade btn-block" value="<?php echo $result_array['pid']; ?>">View Plan</button>
             </form>
         </div>
      </div>
    </div>

 <?php }
 }
?>
<?php
  function text_input($text){
    if ($text>0) {
      echo "<strong style=\"color:#66ff00\">"."₹ ".abs($text)."</strong>";
    }
    elseif($text<0){
      echo "<strong style=\"color:#ff3300\">"."Overspent by ₹ ".abs($text)."</strong>";
    }
    else {
      echo "<strong>₹ 0</strong>";
    }
  }
?>
<?php  ?>
<?php
// this function provide remaining amount
function remain_amount($con,$id,$user_id){
  $sql_query="SELECT SUM(amount_spent),initial_budget from new_expense_details nd INNER JOIN plandetails pd where nd.trip_id='$id' and pd.user_id='$user_id' and nd.trip_id=pd.pid";
  $sql_query_result=mysqli_query($con,$sql_query) or die(mysqli_error($con));
  $result_array=mysqli_fetch_array($sql_query_result);
  if(is_null($result_array['SUM(amount_spent)'])){
    return $result_array['initial_budget'];
  }
  else{
    $remainamount = $result_array['initial_budget'] - $result_array['SUM(amount_spent)'];
    return $remainamount;
  }
}
?>
<?php
  function share_input($share){
    if ($share>0) {
      echo "<strong style=\"color:#66ff00\">"."Get Back ₹ ".abs($share)."</strong>";
    }
    elseif($share<0){
      echo "<strong style=\"color:#ff3300\">"."Owes ₹ ".abs($share)."</strong>";
    }
    elseif(is_null($share)){
      echo "₹ 0";
    }
    else {
      echo "<strong>All Settled up</strong>";
    }
  }
?>
<?php
//this function give details about amount spent by a person
  function Individual_amount_spent($con,$trip_id){

    $sql="SELECT person_name FROM persondetails where trip_id='$trip_id'";
    $sql_query_result=mysqli_query($con,$sql) or die(mysqli_error($con));
    $total_amount=0;
    while($person_array=mysqli_fetch_array($sql_query_result)){
      $sql_query="SELECT SUM(amount_spent) from new_expense_details where trip_id='$trip_id' and person='{$person_array["person_name"]}'";
      $query_result=mysqli_query($con,$sql_query) or die(mysqli_error($con));
      $sql_array=mysqli_fetch_array($query_result);
      if(is_null($sql_array['SUM(amount_spent)'])){
        $amount=0;
      }
      else{
        $total_amount=$total_amount+$sql_array['SUM(amount_spent)'];
        $amount=$sql_array['SUM(amount_spent)'];
      }
      ?>
     <h6 class="h5_heading_adjust"><strong><?php echo $person_array['person_name'];?></strong><div style="float:right;"><?php echo "₹ ".$amount; ?></div></h6>
  <?php }
    return $total_amount;
    }
 ?>
 <?php
 //this function give details about individual share of people
   function Individual_share($con,$individual_share,$trip_id){

     $sql="SELECT person_name FROM persondetails where trip_id='$trip_id'";
     $sql_query_result=mysqli_query($con,$sql) or die(mysqli_error($con));
     while($person_array=mysqli_fetch_array($sql_query_result)){
       $sql_query="SELECT SUM(amount_spent) from new_expense_details where trip_id='$trip_id' and person='{$person_array["person_name"]}'";
       $query_result=mysqli_query($con,$sql_query) or die(mysqli_error($con));
       $sql_array=mysqli_fetch_array($query_result);
       if ($individual_share==0) {
         $share=null;
       }
       elseif(is_null($sql_array['SUM(amount_spent)'])){
         $sql_array['SUM(amount_spent)']=0;
         $share=$sql_array['SUM(amount_spent)']-$individual_share;
       }
       else{
       $share=$sql_array['SUM(amount_spent)']-$individual_share;
     }
       ?>
      <h6 class="h5_heading_adjust"><strong><?php echo $person_array['person_name'];?></strong><div style="float:right;"><?php echo share_input($share); ?></div></h6>
   <?php }
     }
  ?>
