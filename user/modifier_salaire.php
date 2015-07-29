<?php 
include('include/header.php')
?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Modifier Salaire</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Modifier Salaire</h1>
			</div>
		</div><!--/.row-->
		
		<br><br>
		<?php 
		$id=$_GET['id'];
		$id_c=$_GET['id_c'];
		$liste=$sal->select_salaire_id($id_c);
		
		foreach($liste as $row)
		{
			$salaire=$row['salaire'];
			
		}
		?>
		<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']."?id=".$_GET['id']."&id_c=".$_GET['id_c']; ?>">
	  <input type="hidden" name="id" value="<?php echo $id; ?>">
	  <input type="hidden" name="id_c" value="<?php echo $id_c; ?>">
		<?php
 
 $salaireE='';
 
	 if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			$erreur = true ; 
if( $controle->vide($_POST["salaire"])) 
{
	$salaireE=" * champ obligatoire";

}	





if($controle->no_vide($_POST["salaire"]))
{		

			$salaire = $_POST['salaire'];
			
			
			$update = $sal->modifier_salaire($id_c,$salaire);
			if($update)
			{
				$link="liste_poste.php?message=update&id=$id";
				$user->location($link);
			}
		}
	}
	?>	
 <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Salaire</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" value="<?php echo $salaire; ?>" id="firstname" name="salaire">
     <span class="error"><?php echo $salaireE;?></span>
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
