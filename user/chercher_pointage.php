<?php 
 session_name('SESSION1');
			session_start();
include('include/header.php');
$personnel = $_POST['personnel'];


		$id_user=$_SESSION['id'] ;
		
$per->chercher_personnel_pointage($id_user,$personnel);



?>
		
	