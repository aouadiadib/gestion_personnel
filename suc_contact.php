<!DOCTYPE html>
<?php 
require_once('user/class/class.php');
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>RH</title>
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
<!-- Font Awesome  -->
<link href="css/font-awesome.min.css" rel="stylesheet">
<!-- Web Font  -->
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
<!-- Custom CSS -->
<style>
.error {color: #FF0000;}
</style>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.html"> OPEN E R P</a> </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="index.php">Accueil</a></li>
        <li><a href="inscription.php">Inscription</a></li>
        <li><a href="user/index.php">Connexion</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- Slider -->
<div class="header-banner"> 
  <script src="js/responsiveslides.min.js"></script> 
  <script>
			 $(function () {
			  $("#slider").responsiveSlides({
				auto: true,
				nav: true,
				speed: 500,
				namespace: "callbacks",
				pager: true,
			  });
			 });
			 </script>
  
</div>
<!-- Welcome Section -->
<div id="section_header">
  <h2><span>Contact</span> </h2>
</div>

 <div class="container">
    <br><br><br>
	<center>
	<h1>Contact Poser avec succées</h1>
	</center>
    <div class="col-md-6">
     
     <br><br><br><br><br><br>
     <br><br><br><br><br><br>
     <br><br><br><br><br><br>
     <br><br><br><br><br><br>
     <br><br><br><br><br><br>
     <br><br><br><br><br><br>
	 
	 
	 
	 
    </div>
  </div>
<br><br>
<!-- Footer -->
<div id="footerwrap">
  <div class="container">
    <div class="row">
      <div class="col-md-8"> <span class="copyright">Copyright &copy; 2015 tout les droits reservée</a></span> </div>
      <div class="col-md-4">
        <ul class="list-inline social-buttons">
          <li><a href="#"><i class="fa fa-twitter"></i></a> </li>
          <li><a href="#"><i class="fa fa-facebook"></i></a> </li>
          <li><a href="#"><i class="fa fa-google-plus"></i></a> </li>
          <li><a href="#"><i class="fa fa-linkedin"></i></a> </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Bootstrap core JavaScript --> 
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>