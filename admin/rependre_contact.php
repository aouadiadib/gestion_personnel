<?php 
include('include/header.php')
?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Liste Réclamation</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Liste Réclamation</h1>
			</div>
		</div><!--/.row-->
		<br><br>
		
		<br><br>

 <?php 

 
 $per->affichage();
 

 ?>

 <br>
		
		<?php 
		$id = $_GET["id"];
		
		$liste = $admin->afficher_contact($id);
				
				foreach($liste as $row)
				{
					$id = $row["id_contact"];
					$email = $row["email"];
					$sujet = $row["sujet"];
                                        $texte = $row["texte"];
                                }	
					
			
?>
	<table class="table table-responsive table-bordered table-hover">
<tr>
<td>
Email :  
</td>
<td>
<?php echo $row['email']; ?>
</td>
</tr>

<tr>
<td>
Sujet :  
</td>
<td>
<?php echo $row['sujet']; ?>
</td>
</tr>
<tr>
<td>
Texte :  
</td>
<td>
<?php echo $row['texte']; ?>
</td>
</tr>
        </table
        <br><br>
 <form  role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']."?id=".$_GET['id']; ?>">
 <input type="hidden" name="id_personnel" value="<?php echo $id; ?>">
 <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
 $rep = $_POST["repense"];


 
     $link='liste_reclamation.php?message=update';
				$user->location($link);
 
                }
 ?>
  <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">texte</label>
      <div class="col-sm-6">
         <textarea name="repense" cols="80" rows="8">
		 
		 </textarea>
	  </div>
	   </div>
	   <div class="form-group">
      <label class="col-sm-2 control-label"></label>
	  <input type="submit" value="Rependre" class="btn btn-primary">
	
   </div>
				
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
