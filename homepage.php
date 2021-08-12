<?php
require './includes/common.php';
if (!isset($_SESSION['email'])){
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body style="padding-top:50px">
        <!---navbar start---->
            <?php
            include './includes/header.php';
            include './includes/function_script.php';
            ?>
        <!---navbar end--->

        <div class="container" id="content1">

            <?php if(!isset($_SESSION['tabid'])){ ?>
                <h1>You don't have any active plans</h1>
                <div class="row" id="bottom-adjustment">
                    <div class="just">
                        <a href="createnewplanpage.php"><span class="glyphicon glyphicon-plus-sign greenish"></span>Create a New Plan</a>
                    </div>
                </div>
            <?php } else { ?>
                <h1>Your's Plans</h1>
                            <?php addtag_items($con,$_SESSION['user_id']); ?>

            <?php } ?>
        </div>
        <?php
            if(isset($_SESSION['tabid'])){?>
              <a href="createnewplanpage.php"><div class="circle"><span class="glyphicon glyphicon-plus addsign"></span></div></a>

      <?php    }
      ?>
        <!---footer start--->
    <?php
         include './includes/footer.php';
       ?>
       <!---footer end--->

</body>
</html>
