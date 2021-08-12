<?php
require 'common.php';
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['contact'];
$regex="/[0-9]{10}/";
$regex_email = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/";
if (!preg_match($regex_email, $email)) {
  echo "<script>alert('Enter Correct Email');window.location.href = '/../expensemanager/signup.php';</script>";
}
elseif(strlen($password) < 8){
  echo "<script>alert('Minimum 8 character required');window.location.href = '/../expensemanager/signup.php';</script>";
}
elseif(strlen($phone)<>10){
  echo "<script>alert('Not a valid phone number');window.location.href = '/../expensemanager/signup.php';</script>";
}
else{
  if($phone[0]=='0'){
      echo "<script>alert('Not a valid phone number');window.location.href = '/../expensemanager/signup.php';</script>";
  }
  elseif (!preg_match($regex,$phone)) {
      echo "<script>alert('Not a valid phone number');window.location.href = '/../expensemanager/signup.php';</script>";
  }
  else{
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $name =mysqli_real_escape_string( $con ,$_POST['name']);
    $phone = $_POST['contact'];
    $password =md5($_POST['password']);
    $select = "SELECT id from users where email='$email'";
    $query_result = mysqli_query($con,$select) or die(mysqli_error($con));
    $rows = mysqli_num_rows($query_result);
    if ($rows > 0){
      echo "<script>alert('email already exists');window.location.href = '/../expensemanager/signup.php';</script>";
    }
    else{
      $user_registration_query = "INSERT INTO users(name,email,password,phone) values ('$name', '$email', '$password','$phone')";
      $user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
      $_SESSION['email'] = $email;
      $_SESSION['user_id'] = mysqli_insert_id($con);
      echo "<script>alert('user successfully registered');window.location.href = '/../expensemanager/homepage.php';</script>";
    }
  }
}



?>
