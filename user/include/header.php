<!DOCTYPE html>
<?php 
require_once('class/class.php');
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>RH</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="accueil.php"><span><strong>Gestion ressource humaine</strong></span></a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><strong> Utilisateur</strong> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="changer_pass.php"><span class="glyphicon glyphicon-cog"></span> Changer mot de passe</a></li>
							<li><a href="class/logout.php"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="accueil.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
			<li class="parent">
				<a href="liste_personnel.php">
					<span class="glyphicon glyphicon-user"></span> Gestion Personnel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="ajouter_personnel.php">
							<span class="glyphicon glyphicon-plus"></span> Ajouter Personnel
						</a>
					</li>
					<li>
						<a class="chercher_personnel.php" href="chercher_personnel.php">
							<span class="glyphicon glyphicon-search"></span> Chercher Personnel
						</a>
					</li>
					<li>
						<a class="" href="liste_personnel.php">
							<span class="glyphicon glyphicon-list-alt"></span> Liste Personnel
						</a>
					</li>
					
					
				</ul>
			</li>
			
			<li><a href="liste_conge.php"><span class="glyphicon glyphicon-time"></span> Gestion de Congé</a></li>
			
		
		<li><a href="chercher_liste_pointage.php"><span class="glyphicon glyphicon-hand-down"></span> Gestion de pointage</a></li>
		<li><a href="liste_assiduite.php"><span class="glyphicon glyphicon-hand-down"></span> Gestion assiduité</a></li>
		
		
		<li><a href="liste_poste.php"><span class="glyphicon glyphicon-euro"></span> Formule Salaire</a></li>
		
		<li><a href="liste_salaire.php"><span class="glyphicon glyphicon-euro"></span> Liste de Salaire</a></li>
			
			<li><a href="liste_reclamation.php"><span class="glyphicon glyphicon-time"></span> Gestion de Reclamation</a></li>
			
			<li><a href="class/logout.php"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a></li>
			
			
			</ul>
		</div><!--/.sidebar-->