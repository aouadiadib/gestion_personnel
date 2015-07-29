<?php 
session_name('SESSION1');
							session_start();
include('include/header.php')
?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Accueil</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Accueil</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<em class="glyphicon glyphicon-user glyphicon-l"></em>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
							<?php
							
							$id_user=$_SESSION['id'] ;
							$nbr = $per->total_personnel($id_user);
							echo $nbr;
							?>
							</div>
							<div class="text-muted">Personnel</div>
						</div>
					</div>
				</div>
			</div>
			
					<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<em class="glyphicon glyphicon-time glyphicon-l"></em>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
							<?php
							
							$nbr_c = $cong->total_conge($id_user);
							echo $nbr_c;
							?>
							</div>
							<div class="text-muted"> en congé</div>
						</div>
					</div>
				</div>
			</div>
			
			
			
			
		</div>
					
		
			
					<?php
						 $point->total_heur($id_user);
						
					?>
					
					
				
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script>
	
	var randomScalingFactor = function(){ return Math.round(Math.random()*1000)};
	
	var lineChartData = {
			labels : ["January","February","March","April","May","June","July","Aout","Septembre","Octobre","Novombre","Decembre"],
			datasets : [
				
				{
					label: "My Second dataset",
					fillColor : "rgba(0, 0, 0, 0)",
					strokeColor : "rgba(48, 164, 255, 20)",
					pointColor : "rgba(48, 164, 255, 1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(48, 164, 255, 1)",
				
					
					data : [0,0,0,0,0,0,0,0,0,0,0,0]
				}
			]

		}
		
	

	

window.onload = function(){
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
		responsive: true
	});
	
};
	
	</script>
					
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
