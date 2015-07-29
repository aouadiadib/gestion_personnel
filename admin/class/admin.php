<?php
require_once("DataBase.php");
class admin
{
	
	
	public function __construct()
	{
	
	}
	
	public function ajouter_reclamation($sujet,$texte,$id_user)
	{
		
		$insert = DataBase::connect()->prepare('insert into reclamation VALUES
		(NULL,:etat,:sujet,:texte,NULL,:id)');
try {		
	$ins = $insert->execute(
	array(
	
	'etat'=>"en cours de traitement",
	'sujet'=>$sujet,
	'texte'=>$texte,
	'id'=>$id_user
	
	
	)
	);
}
		catch( Exception $e )
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
			
		return true;
	}


 
 public function liste_reclamation()
 {
	$select = DataBase::connect()->query("select * from reclamation  order by id_rec DESC");
	$liste = $select->fetchAll(PDO::FETCH_ASSOC);
	return $liste;
 }
 
 public function select_reclamation($id)
 {
	$select = DataBase::connect()->query("select * from reclamation  where id_rec='$id'");
	$liste = $select->fetchAll(PDO::FETCH_ASSOC);
	return $liste;
 }
public function liste_contact()
 {
	$select = DataBase::connect()->query("select * from contact  order by id_contact DESC");
	$liste = $select->fetchAll(PDO::FETCH_ASSOC);
	return $liste;
 }	
 
 
 
	public function liste_entreprise()
 {
	 $select = DataBase::connect()->query("select distinct  entreprise from user  ");
	$liste = $select->fetchAll(PDO::FETCH_ASSOC);
	return $liste;
 }

	
 public function afficher_reclamation($id)
 {
	$select = DataBase::connect()->query("select * from reclamation where id_rec='$id' order by id_rec DESC");
	$liste = $select->fetchAll(PDO::FETCH_ASSOC);
	return $liste;
 }	
 public function afficher_contact($id)
 {
	$select = DataBase::connect()->query("select * from contact where id_contact='$id' order by id_contact DESC");
	$liste = $select->fetchAll(PDO::FETCH_ASSOC);
	return $liste;
 }	

  public function modifier_reclamation($id,$rep,$etat)
 {
	$select = DataBase::connect()->query("update  reclamation set repense='$rep',etat='$etat' where id_rec='$id' ");
	if($select)
        {
            return true;
        }
 }	
 
 
 
 
 
 
}




 
?>