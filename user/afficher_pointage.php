<?php 
include('include/header.php')
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Liste personnel (Pointage)</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Recherche personnel (Pointage)</h1>
			</div>
		</div><!--/.row-->
		<br><br>
		
			<?php 
		$id = $_GET['id'];
		$liste = $per->select_personnel($id);
		foreach($liste as $row) {

		?>
		
		<br><br>
<table class="table table-responsive table-bordered table-hover">
<tr>
<td>
ID :  
</td>
<td>
<?php echo $row['id_personnel']; ?>
</td>
</tr>

<tr>
<td>
Nom : 
</td>
<td>
<?php echo $row['nom']; ?>	
</td>
</tr>
<tr>
<td>	
Prénom :
</td>
<td>
  <?php echo $row['prenom']; ?>
</td>
</tr>  
<tr>
<td>
NCIN :
</td>
<td>
 <?php echo $row['ncin']; ?>	
</td>
</tr>

</table>

<?php } ?>	

<br><br>
<form class="form-horizontal"  name="entre" id="entre" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']."?id=".$_GET['id']; ?>">
 <?php 
  if (isset($_POST["submit_entre"]))  
 {
 $heur_e=$_POST["entre"];

 $point->pointage_entre($id,$heur_e);
 }
 ?>

 <div class="form-group">
      <label for="firstname" class="col-sm-3 control-label">Heur d'entrée</label>
      <div class="col-sm-6">
<select class="form-control" name="entre">
<option value="08:00">8 H</option>
<option value="09:00">9 H</option>
<option value="10:00">10 H</option>
<option value="11:00">11 H</option>
<option value="12:00">12 H</option>
<option value="13:00">13 H</option>
<option value="14:00">14 H</option>
<option value="15:00">15 H</option>
<option value="16:00">16 H</option>
<option value="17:00">17 H</option>
<option value="18:00">18 H</option>
<option value="19:00">19 H</option>
<option value="20:00">20 H</option>
</select>
	  </div>
	  
	   <div class="col-sm-3">
	   <input type="submit" class="btn btn-primary" name="submit_entre" id="entre" value="Pointage">
	   </div>
	   </div>
	   </form>
 <br><br>
 
<form class="form-horizontal" id="sortie" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']."?id=".$_GET['id']; ?>">
 <?php 
 
 if (isset($_POST["submit_sortie"])) 
 {
 $heur_s=$_POST["sortie"];
 $id_pointage=$point->dernier_pointage($id);
 $point->pointage_sortie($id_pointage,$heur_s);
 }
 
 ?>
  <div class="form-group">
      <label for="firstname" class="col-sm-3 control-label">Heur de sortie</label>
      <div class="col-sm-6">
<select class="form-control" name="sortie">
<option value="08:00">8 H</option>
<option value="09:00">9 H</option>
<option value="10:00">10 H</option>
<option value="11:00">11 H</option>
<option value="12:00">12 H</option>
<option value="13:00">13 H</option>
<option value="14:00">14 H</option>
<option value="15:00">15 H</option>
<option value="16:00">16 H</option>
<option value="17:00">17 H</option>
<option selected value="18:00">18 H</option>
<option value="19:00">19 H</option>
<option value="20:00">20 H</option>
</select>
	  </div>
	  
	   <div class="col-sm-3">
	   <input type="submit" class="btn btn-primary" name="submit_sortie" id="sortie" value="Pointage">
	   </div>
	   </div>
 
 
</form>
<br><br>
	
<br>
 <?php 

 
 $per->affichage();
 

 ?>

<br>
		<table class='table table-responsive table-bordered table-hover'>
		<thead>
		<tr>
		<td>Date</td><td>Heur d'entrée</td> <td>Heur de sortie</td> <td></td>
		</tr>
		</thead>
		<tbody>
		<?php 
		$point->liste_pointage($id);
		?>
		</tbody>
		</table>
			
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script>

	$("document").ready(function(){
	$("#personnel").keyup(function(){
	  var formData=$("#recherche").serialize();
	
	var personnel = $("#personnel").val();
	$.ajax({
		type: "POST",
		url: "chercher_pointage.php",
		cache:false,
		data: formData,
		success:onSucces,
		error:onErro 
			
  });
	function onSucces(data,status){
		$("#affichage").html(data);
			}
	function onErro(data,status){
		alert('erreur');
			}
	
	});
	});
	
	</script>
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
