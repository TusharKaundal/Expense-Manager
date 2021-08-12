<?php
require 'common.php';
 $_SESSION['budgets']=$_POST['budget'];
 $_SESSION['no_ofpeople']=$_POST['no_of_people'];
 header('location: /../expensemanager/plandetails.php');
?>
