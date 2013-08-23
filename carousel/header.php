<?php 
session_start(); 
$database_name = 'jingo2';
$user = 'yaojiani';
$password = '66200535' ;


$mysqli = mysqli_connect("127.0.0.1", $user, $password, $database_name);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>jingo</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../include/css/carousel.css" rel="stylesheet">
<!--
    <link rel="stylesheet" type="text/css" href="../include/css/style.css">
  -->

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
   
    

   
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <?php
    if ($_SESSION['loggedin']) {
      $email = $_SESSION['email'];
  
    ?>
    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-static-top">
          <div class="container">
    	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
    	      <span class="icon-bar"></span>
    	      <span class="icon-bar"></span>
    	      <span class="icon-bar"></span>
    	    </button>
            <a class="navbar-brand" href="#">JINGO</a>
            <div class="nav-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="home.php">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="nav-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
                <li><a href="user.php"><?php echo $email ;?></a></li>
                <li><a href="signout.php">Sign out</a></li>
                <!--
                <li style="top:14px;"><input id="search" type="text" placeholder="Search"  style="float:right;border:2px solid;border-radius:5px; "></li>-->
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>

    <?php } ?>
  

  

  