<?php
require 'common.php';
$id=$_SESSION['id'];
$title=strtoupper($_POST['title']);
$date=$_POST['date2'];
$amount=$_POST['amount_s'];
$person=$_POST['choice'];
$user_id=$_SESSION['user_id'];
function GetImageExtension ($imagetype){
  if ( empty ($imagetype)) return false ;
    switch ($imagetype){
      case 'image/bmp' : return '.bmp' ;
      case 'image/gif' : return '.gif' ;
      case 'image/jpeg' : return '.jpg' ;
      case 'image/png' : return '.png' ;
    default : return false ;
  }
}
if (! empty ($_FILES[ "uploadedimage" ][ "name" ])) {
  $file_name=$_FILES[ "uploadedimage" ][ "name" ];
  $temp_name=$_FILES[ "uploadedimage" ][ "tmp_name" ];
  $imgtype=$_FILES[ "uploadedimage" ][ "type" ];
  $ext= GetImageExtension($imgtype);
  $imagename=date( "d-m-Y" ). "-" .time().$ext;
  $target_path = "../img/".$imagename;
  if (move_uploaded_file($temp_name, $target_path)){
	  $target_path = "./img/".$imagename;
      $sql="INSERT INTO new_expense_details(expense_name,person,upload_date,amount_spent,img_dir,trip_id) values ('$title','$person','$date','$amount','$target_path','$id')";
      $query_result=mysqli_query($con,$sql) or die(mysqli_error($con));
      header('location:/../expensemanager/viewplanpage.php');
  }

}else{
  $sql_query="INSERT INTO new_expense_details(expense_name,person,upload_date,amount_spent,trip_id) values ('$title','$person','$date','$amount','$id')";
  $sql_query_result=mysqli_query($con,$sql_query) or die(mysqli_error($con));
  header('location:/../expensemanager/viewplanpage.php');
}
?>
