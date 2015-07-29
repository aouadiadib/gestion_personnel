<?php 
session_name('SESSION1');
			session_start();
include('include/header.php')
?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Ajouter Réclamation</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ajouter Réclamation</h1>
			</div>
		</div><!--/.row-->
		
		<br><br>
		<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
 <?php
 
 $sujetE=$texteE="";
 
	 if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			$erreur = true ; 
if( $controle->vide($_POST["sujet"])) 
{
	$sujetE=" * champ obligatoire";

}	

if( $controle->vide($_POST["texte"])) 
{
	$texteE=" * champ obligatoire";
}







if($controle->no_vide($_POST["sujet"],$_POST["texte"]) && ($erreur==true))
{		

			$sujet = $_POST['sujet'];
			$texte = $_POST['texte'];
			
			 
			
			$id_user=$_SESSION['id'] ;
			
			$ajout=$rec->ajouter_reclamation($sujet,$texte,$id_user);
			
			if($ajout)
			{
				$link='liste_reclamation.php?message=add';
				$user->location($link);
			}
		}}
	?>	
 <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">sujet</label>
      <div class="col-sm-6">
         <input type="text" class="form-control" id="firstname" name="sujet" placeholder="">
      
	  </div>
	   </div>
	   
	   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">texte</label>
      <div class="col-sm-6">
         <textarea name="texte" cols="80" rows="8">
		 
		 </textarea>
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
