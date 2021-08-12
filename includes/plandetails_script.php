<?php
require 'common.php';
if (!isset($_SESSION['email'])){
  header('location:index.php');
}
$user_id=$_SESSION['user_id'];
$title=$_POST['title'];
$start_date=$_POST['start'];
$end_date=$_POST['end'];
$budget=$_POST['budget'];
$no_of_people=$_POST['no_of_people'];
$sql_query="INSERT INTO plandetails(title,user_id,no_of_people,start_date,end_date,initial_budget) values('$title','$user_id','$no_of_people','$start_date','$end_date','$budget')";
$sql_query_result=mysqli_query($con,$sql_query) or die(mysqli_error($con));
$_SESSION['tabid']=mysqli_insert_id($con);
for ($i=1; $i <= $no_of_people ; $i++) {
  $person_name=$_POST["tag$i"];
  $sql="INSERT INTO persondetails(user_id,trip_id,person_name) values('$user_id','{$_SESSION["tabid"]}','$person_name') ";
  $query_result = mysqli_query($con, $sql) or die(mysqli_error($con));
}
echo "<script>alert('Your New Budget Planner Added Successfully');window.location.href = '/../expensemanager/homepage.php';</script>";
?>
