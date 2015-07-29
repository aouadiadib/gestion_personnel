<?php 
include('include/header.php');
$personnel = $_POST['personnel'];

 session_name('SESSION1');
session_start();
$id_user=$_SESSION['id'] ;	

$per->chercher_personnel($id_user,$personnel);



?>
		
	