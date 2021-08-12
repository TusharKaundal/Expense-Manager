<?php
require 'common.php';
$user_id=$_SESSION['user_id'];
$oldpassword = md5($_POST['old_password']);
$newpassword = md5($_POST['new_password']);
$retypepassword = md5($_POST['confirm_password']);
$sql1="SELECT password FROM users where id='$user_id'";
$sql1_result = mysqli_query($con,$sql1) or die(mysqli_error($con));
$sqli_fetch = mysqli_fetch_array($sql1_result);
if ($oldpassword == $sqli_fetch['password']) {
  if(strlen($_POST['new_password'])<8){
    echo "<script>alert('Minimum 8 characters');window.location.href = '/../expensemanager/changepassword.php';</script>";
  }
  elseif ($newpassword == $retypepassword){
    $sql2 = "UPDATE users SET password='$newpassword' where id=$user_id";
    $sql2_result = mysqli_query($con,$sql2) or die(mysqli_error($con));
    echo "<script>alert('Password updated');window.location.href = '/../expensemanager/logout.php';</script>";
  }
  else{
    echo "<script>alert(\""."Password don't match"."\");window.location.href = '/../expensemanager/changepassword.php';</script>";
  }
}
else {
  echo "<script>alert('Wrong old password');window.location.href = '/../expensemanager/changepassword.php';</script>";
}

?>
