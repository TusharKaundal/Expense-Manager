      <nav class="navbar navbar-inverse navbar-fixed-top custom-shawdow">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Ct₹l Budget</a>
         </div>
        <div class="collapse navbar-collapse" id="navbar1">
         <ul class="nav navbar-nav navbar-right">
          <?php
          if (isset($_SESSION['email'])) {
            ?>
             <li><a href = "aboutuspage.php"><span class = "glyphicon glyphicon-info-sign"></span> About Us </a></li>
             <li><a href = "changepassword.php"><span class = "glyphicon glyphicon-cog"></span> Change Password</a></li>
             <li><a href = "logout.php"><span class = "glyphicon glyphicon-log-out"></span> Logout</a></li>
             <?php
               } else {
              ?>
              <li><a href = "aboutuspage.php"><span class = "glyphicon glyphicon-info-sign"></span> About Us </a></li>
              <li><a href = "signup.php"><span class = "glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href = "login.php"><span class = "glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php
              }
              ?>
            </ul>
          </div>
        </div>
      </nav>
