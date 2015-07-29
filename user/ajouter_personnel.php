<?php 
session_name('SESSION1');
session_start();
include('include/header.php')
?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Ajouter Personnel</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ajouter Personnel</h1>
			</div>
		</div><!--/.row-->
		
		<br><br>
		<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
 <?php
 
 $posteE=$ncinE=$emailE=$telE=$nomE=$prenomE="";
 
	 if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			$erreur = true ; 
if( $controle->vide($_POST["poste"])) 
{
	$posteE=" * champ obligatoire";

}	

if( $controle->vide($_POST["ncin"])) 
{
	$ncinE=" * champ obligatoire";
}

if( $controle->vide($_POST["email"])) 
{
	$emailE=" * champ obligatoire";
}
if( $controle->vide($_POST["tel"])) 
{
	$telE=" * champ obligatoire";
}

if( $controle->vide($_POST["nom"])) 
{
	$nomE=" * champ obligatoire";
}
if( $controle->vide($_POST["prenom"])) 
{
	$prenomE=" * champ obligatoire";
}

if($controle->no_vide($_POST["email"]) && $controle->no_email($_POST['email']))
{
	$emailE="  Email incorrecte";
	$erreur = false ;
}

if($controle->no_vide($_POST["ncin"]) && $controle->noNCIN($_POST['ncin']))
{
	$ncinE="  NCIN incorrecte";
	$erreur = false ;
}
if($controle->no_vide($_POST["tel"]) && $controle->noTEL($_POST['tel']))
{
	$telE="  Num tel incorrecte";
	$erreur = false ;
}


if($controle->no_vide($_POST["prenom"],$_POST["nom"],$_POST["poste"],$_POST["ncin"],$_POST["email"],$_POST["tel"]) && ($erreur==true))
{		

			$poste = $_POST['poste'];
			$ncin = $_POST['ncin'];
			$email = $_POST['email'];
			$tel = $_POST['tel'];
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$id_departement = $_POST['departement'];
			
			 
			
			$id_user=$_SESSION['id'] ;
			
			$ajout=$per->ajouter_personnel($poste,$ncin,$email,$tel,$nom,$prenom,$id_departement,$id_user);
			
			if($ajout)
			{
				$link='liste_personnel.php?message=add';
				$user->location($link);
			}
		}}
	?>	
 <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Nom</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="nom" placeholder="">
      <span class="error"><?php echo $nomE;?></span>
	  </div>
	   </div>
	   
	   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Prénom</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="prenom" placeholder="">
      <span class="error"><?php echo $prenomE;?></span>
	  </div>
	   </div>
	   
	   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">NCIN</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="ncin" placeholder="">
      <span class="error"><?php echo $ncinE;?></span>
	  </div>
	   </div>
	   
	   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Teléphone</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="tel" placeholder="">
      <span class="error"><?php echo $telE;?></span>
	  </div>
	   </div>
	   
	   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">E-MAIL</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="email" placeholder="">
      <span class="error"><?php echo $emailE;?></span>
	  </div>
	   </div>
	   <div class="form-group">
      <label class="col-sm-2 control-label">Departement</label>
	  <div class="col-sm-6">
	    <?php 
		$per->select_departement();
		?>
    
   </div>
   </div>
  
	   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Poste</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="poste" placeholder="">
     <span class="error"><?php echo $posteE;?></span>
	 </div>
	   </div>
	   
	    
	   <br><br>
	    <div class="form-group">
      <label class="col-sm-2 control-label"></label>
	  <input type="submit" value="Ajouter" class="btn btn-primary">
	
   </div>
   
</form>	   
				
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
