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
    <div class="col-md-6">
      <h3>Contact info</h3>
      <p><span>Addresse:</span> rue 1 bousalem jendouba</p>
      <p><span>Email:</span> +216 26 715 671</p>
    </div>
    <div class="col-md-6">
      <h3>Contact</h3>
      <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">

	  
	  <?php 
	   $emailE=$sujetE=$texteE='';
	    if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			$erreur = true ;
			if( $controle->vide($_POST["email"])) 
			{
				$emailE=" * champ obligatoire";
			}
			if( $controle->vide($_POST["sujet"])) 
			{
				$emailE=" * champ obligatoire";
			}
			if( $controle->vide($_POST["texte"])) 
			{
				$emailE=" * champ obligatoire";
			}
			
			
			if($controle->no_vide($_POST["email"]) && $controle->no_vide($_POST["sujet"]) && $controle->no_vide($_POST["texte"]))
			{
				
				
				$email=$_POST["email"];
				$sujet=$_POST["sujet"];
				$texte=$_POST["texte"];
				
				$insert = $user->contact($email,$sujet,$texte);
				if($insert)
				{
					$link = 'suc_contact.php';
					$user->location($link);
				}				
			}
		}
	  
	  ?>
        <div class="form_details">
            <input type="text" class="text" name="email" placeholder="votre email" >
            <input type="text" class="text" name="sujet" placeholder="votre sujet" >
            <textarea  name="texte" placeholder="votre message"></textarea>
          <div class="clearfix"> </div>
          <button class="btn btn-success" type="submit">Poser contact</button>
        </div>
      </form>
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