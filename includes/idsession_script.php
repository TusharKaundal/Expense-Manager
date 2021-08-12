<?php
require 'common.php';
$_SESSION['id']=$_POST['button'];
$user_id=$_SESSION['user_id'];
$sql_query="SELECT initial_budget,no_of_people FROM plandetails where pid='{$_SESSION["id"]}' and user_id='$user_id' ";
$sql_query_result=mysqli_query($con,$sql_query) or die(mysqli_error($con));
$result_array=mysqli_fetch_array($sql_query_result);
$_SESSION['budgets']=$result_array['initial_budget'];
$_SESSION['no_of_people']=$result_array['no_of_people'];
header('location: /../expensemanager/viewplanpage.php');
?>
