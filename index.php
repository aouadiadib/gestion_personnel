<!DOCTYPE html>
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
  <div class="container">
    <div class="slider">
      <div class="callbacks_container">
        <ul class="rslides" id="slider">
          <li> <img src="images/bnr1.jpg" alt="">
            <div class="caption">
              <h1>Gestion Ressource Humaine<span>.</span></h1>
              <p>Outili pour la gestion ressource humaine</p>
			        </li>
          <li> <img src="images/bnr2.jpg" alt="">
            <div class="caption">
              <h1>Gestion Salaire<span>.</span></h1>
              <p>Outili pour la gestion des salaires</p>
			      </li>
          
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Welcome Section -->
<div id="section_header">
  <h2><span>Bienvenue</span> au notre site web</h2>
</div>
<div id="welcome">
  <div class="container">
    <div class="col-md-6"> <img class="img-responsive" src="images/about1.jpg" align=""> </div>
    <div class="col-md-6">
      <h3>A propos</h3>
      <p>
	  La gestion des ressources humaines (GRH), ou plus anciennement gestion du personnel, recouvre l'ensemble des pratiques mises en œuvre pour administrer, mobiliser et développer les ressources humaines impliquées dans l'activité d'une organisation.
	  </p>
	  <p>
	  La gestion des ressources humaines (GRH), ou plus anciennement gestion du personnel, recouvre l'ensemble des pratiques mises en œuvre pour administrer, mobiliser et développer les ressources humaines impliquées dans l'activité d'une organisation.
	  </p>
	   </div>
</div>
</div>
<!-- What we do Section -->
<div id="section_header">
  <h2><span>Nos</span>Services</h2>
</div>
<div id="main-services">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 centered"> <i class="fa fa-user fa-3x"></i>
        <h3>Gestion Personnel</h3>
        <p>gestion des ressource humaine</p>
		 </div>
		
      <div class="col-lg-4 centered"> <i class="fa fa-eur fa-3x"></i>
        <h3>Gestion Salaire</h3>
       <p>gestion des salries</p> 
		 </div>
      <div class="col-lg-4 centered"> <i class="fa fa-line-chart fa-3x"></i>
        <h3>Statistique</h3>
        <p>outil pour gerer les statistique</p>
		 </div>
    </div>
  </div>
</div>
<!-- Our clients Section -->
<div id="section_header">
  <h2><span>Nos</span> clients</h2>
</div>
<div id="clients">
  <div class="container">
    <div class="row centered">
      <div class="col-lg-8 col-lg-offset-2">
       <p>Liste de nous clients </p>
	   </div>
    </div>
    <div class="row">
      <div class="col-lg-2"> <img src="images/client1.jpg" class="img-responsive"> </div>
      <div class="col-lg-2"> <img src="images/client2.jpg" class="img-responsive"> </div>
      <div class="col-lg-2"> <img src="images/client3.jpg" class="img-responsive"> </div>
      <div class="col-lg-2"> <img src="images/client4.jpg" class="img-responsive"> </div>
      <div class="col-lg-2"> <img src="images/client5.jpg" class="img-responsive"> </div>
      <div class="col-lg-2"> <img src="images/client6.jpg" class="img-responsive"> </div>
    </div>
  </div>
</div>
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