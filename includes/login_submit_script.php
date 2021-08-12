<?php
require 'common.php';
$email = mysqli_real_escape_string($con,$_POST['email']);
$password = md5($_POST['password']);
$select = "SELECT * from users where email='$email'and password='$password'";
$query_result = mysqli_query($con,$select) or die(mysqli_error($con));
$rows = mysqli_num_rows($query_result);
if ($rows == 0){
  echo "<script>alert('Please enter correct e-mail id or password');window.location.href = '/../expensemanager/login.php';</script>";
}
else{
    $array_result = mysqli_fetch_array($query_result);
    $_SESSION['email']=$array_result['email'];
    $_SESSION['user_id']=$array_result['id'];
    $sql = "SELECT * from plandetails where user_id='{$array_result["id"]}'";
    $result = mysqli_query($con,$sql) or die(mysqli_error($con));
    if(mysqli_num_rows($result)==0){

       header('location: /../expensemanager/homepage.php');
    }
    else{
      $_SESSION['tabid']=1;
      header('location: /../expensemanager/homepage.php');
    }



}
?>
