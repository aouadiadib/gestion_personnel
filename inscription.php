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
  <div class="container">
  
  </div>
</div>
<!-- Welcome Section -->
<div id="section_header">
  <h2><span>Inscription Client</span> </h2>
</div>
<br><br>
<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
 <?php 
 
 $emailE=$telE=$entrepriseE=$loginE=$passE=$rpassE= "";
 
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			
			$erreur = true ;
		
if( $controle->vide($_POST["email"])) 
{
	$emailE=" * champ obligatoire";
}

if( $controle->vide($_POST["tel"])) 
{
	$telE=" * champ obligatoire";
}
	
if( $controle->vide($_POST["entreprise"])) 
{
	$entrepriseE=" * champ obligatoire";
}

if( $controle->vide($_POST["login"])) 
{
	$loginE=" * champ obligatoire";
}
if( $controle->vide($_POST["pass"])) 
{
	$passE=" * champ obligatoire";
		$erreur = false ;
}

if( $controle->vide($_POST["rpass"])) 
{
	$rpassE=" * champ obligatoire";
		$erreur = false ;
}

if($_POST['rpass'] != $_POST['pass']) 
{
	$rpassE=" * Confirmation incorrecte";
	$erreur = false ;
}

if($controle->no_vide($_POST["email"]) && $controle->no_email($_POST['email']))
{
	$emailE="  Email incorrecte";
	$erreur = false ;
}

if($controle->no_vide($_POST["tel"]) && $controle->noTEL($_POST['tel']))
{
	$telE="  Num tel incorrecte";
	$erreur = false ;
}
	
if($controle->no_vide($_POST["email"],$_POST["tel"],$_POST["entreprise"],$_POST["login"],$_POST["pass"],$_POST["rpass"]) && $erreur == true)
	{
			$email = $_POST['email'];
			$tel = $_POST['tel'];
			$entreprise = $_POST['entreprise'];
			$login = $_POST['login'];
			$pass = $_POST['pass'];
			$rpass = $_POST['rpass'];
			
			$ins = $user->inscription($email,$tel,$entreprise,$login,$pass,$rpass);
			
			if($ins)
			{
				
				   
				$link='user/index.php';
				$user->location($link);
			}
		}
		
	}
 ?>
 
 
 <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" id="firstname" name="email" placeholder="">
		
      <span class="error"><?php echo $emailE;  ?></span>
	  </div>
	   </div>
	   
	   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Teléphone</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" id="firstname" name="tel" placeholder="">
      <span class="error"><?php echo $telE;  ?></span>
	  </div>
	   </div>
	   
	   
	   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Entreprise</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" id="firstname" name="entreprise" placeholder="">
      <span class="error"><?php echo $entrepriseE;  ?></span>
	  </div>
	   </div>
	   
	   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Login</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" id="firstname" name="login" placeholder="">
      <span class="error"><?php echo $loginE;  ?></span>
	  </div>
	   </div>
	   
	   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Mot de passe</label>
      <div class="col-sm-4">
         <input type="password" class="form-control" id="firstname" name="pass" placeholder="">
      <span class="error"><?php echo $passE;  ?></span>
	  </div>
	   </div>
	   
	   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Confirmation</label>
      <div class="col-sm-4">
         <input type="password" class="form-control" id="firstname" name="rpass" placeholder="">
      <span class="error"><?php echo $rpassE;  ?></span>
	  </div>
	   </div>

	   <br>
	    <div class="form-group">
      <label class="col-sm-4 control-label"></label>

	  <input type="reset" value="Annuler" class="btn btn-default">
		 <input type="submit" value="Inscrire" class="btn btn-success">
	
   </div>
	   
</form>
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