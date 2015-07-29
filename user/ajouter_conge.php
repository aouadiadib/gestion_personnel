<?php 
include('include/header.php')
?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Ajouter Congé</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ajouter Congé</h1>
			</div>
		</div><!--/.row-->
		
		<br><br>
		<?php 
		$id=$_GET["id"];
		?>
		<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']."?id=".$_GET['id']; ?>">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
		<?php
 
 $typeE=$debutE=$finE="";
 
	 if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			$erreur = true ; 
if( $controle->vide($_POST["debut"])) 
{
	$debutE=" * champ obligatoire";

}	

if( $controle->vide($_POST["fin"])) 
{
	$finE=" * champ obligatoire";
}

if( $controle->vide($_POST["type"])) 
{
	$typeE=" * champ obligatoire";
}



if($controle->no_vide($_POST["debut"],$_POST["fin"],$_POST["type"]))
{		

			$debut = $_POST['debut'];
			$fin = $_POST['fin'];
			$type = $_POST['type'];
			$id = $_POST['id'];
			
			$ajout = $cong->ajouter_conge($id,$debut,$fin,$type);
			if($ajout)
			{
				$link='liste_conge.php?message=add';
				$user->location($link);
			}
		}
	}
	?>	
 <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Debut</label>
      <div class="col-sm-6">
         <input type="date" class="form-control" id="firstname" name="debut" placeholder="date de debut">
      <span class="error"><?php echo $debutE;?></span>
	  </div>
	   </div>
	   
	   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Fin</label>
      <div class="col-sm-6">
         <input type="date" class="form-control" id="firstname" name="fin" placeholder="date de fin">
      <span class="error"><?php echo $finE;?></span>
	  </div>
	   </div>
	   
	   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Type</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="type" placeholder="">
      <span class="error"><?php echo $typeE;?></span>
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
