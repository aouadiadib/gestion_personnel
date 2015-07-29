<?php 
require_once('class/class.php');
$id = $_GET['id'];
$per->supprimer_personnel($id);
$link='liste_personnel.php?message=delete';
$user->location($link);

?>