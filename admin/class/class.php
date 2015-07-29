<?php 


 require_once("DataBase.php");
 require_once("user.php");
 require_once("ctrl.php");
 require_once("admin.php");
 require_once("personnel.php");
 
 
 
  $user = new user();
  $per = new personnel();
  $admin = new admin();
  $controle = new ctrl();
  $db= new Database(); 
  


?>