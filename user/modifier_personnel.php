<?php 
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
		<?php 
		$id_g = $_GET['id'];
		$liste = $per->select_personnel($id_g);
		
		foreach($liste as $row)
		{
			$id_departement = $row['id_departement'];
			$nom = $row['nom'];
			$prenom = $row['prenom'];
			$poste = $row['poste'];
			$email = $row['email'];
			$tel = $row['tel'];
			$ncin = $row['ncin'];
			$id_per = $row['id_personnel'];
			
		}
		
		?>
		<br><br>
		
		
		<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']."?id=".$_GET['id']; ?>">
 
  <input type="hidden" name="id_personnel" value="<?php echo $id_per; ?>">
 <?php
 
 $posteE=$ncinE=$emailE=$telE=$nomE=$prenomE="";
 
	 if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{	
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
}





if($controle->no_vide($_POST["prenom"],$_POST["nom"],$_POST["poste"],$_POST["ncin"],$_POST["email"],$_POST["tel"]) && $controle->isEmail($_POST["email"]))
{		

			$poste = $_POST['poste'];
			$ncin = $_POST['ncin'];
			$email = $_POST['email'];
			$tel = $_POST['tel'];
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$id_departement = $_POST['departement'];
			$id_p = $_POST['id_personnel'];
			
			 
		
			$update = $per->modifier_personnel($id_p,$poste,$ncin,$email,$tel,$nom,$prenom,$id_departement);
			if($update)
			{
				$link='liste_personnel.php?message=update';
				$user->location($link);
			}
		}}
	?>	
 <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Nom</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" value="<?php echo $nom; ?>"  name="nom" placeholder="">
      <span class="error"><?php echo $nomE;?></span>
	  </div>
	   </div>
	  
	   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Prénom</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="prenom" value="<?php echo $prenom; ?>" placeholder="">
      <span class="error"><?php echo $prenomE;?></span>
	  </div>
	   </div>
	   
	   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">NCIN</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" value="<?php echo $ncin; ?>" name="ncin" placeholder="">
      <span class="error"><?php echo $ncinE;?></span>
	  </div>
	   </div>
	   
	   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Teléphone</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" value="<?php echo $tel; ?>" name="tel" placeholder="">
      <span class="error"><?php echo $telE;?></span>
	  </div>
	   </div>
	   
	   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">E-MAIL</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" value="<?php echo $email; ?>"  name="email" placeholder="">
      <span class="error"><?php echo $emailE;?></span>
	  </div>
	   </div>
	   <div class="form-group">
      <label class="col-sm-2 control-label">Departement</label>
	  <div class="col-sm-6">
	    <?php 
		$per->check_departement($id_departement);
		?>
    
   </div>
   </div>
  
	   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Poste</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" value="<?php echo $poste; ?>" id="firstname" name="poste" placeholder="">
     <span class="error"><?php echo $posteE;?></span>
	 </div>
	   </div>
	   
	    
	   <br><br>
	    <div class="form-group">
      <label class="col-sm-2 control-label"></label>
	  <input type="submit" value="Modifier" class="btn btn-primary">
	
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
