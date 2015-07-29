<?php
require_once("DataBase.php");
class personnel
{


	public function __construct()
	{
		
	}
	

	
public function ajouter_personnel($poste,$ncin,$email,$tel,$nom,$prenom,$id_departement,$id_user)
	{
	
		$insert = DataBase::connect()->prepare('insert into personnel VALUES
		(NULL,:poste,:ncin,:email,:tel,:nom,:prenom,:id_departement,:id_user)');
try {		
	$ins = $insert->execute(
	array(
	'poste'=>$poste,
	'ncin'=>$ncin,
	'email'=>$email,
	'tel'=>$tel,
	'nom'=>$nom,
	'prenom'=>$prenom,
	'id_departement'=>$id_departement,
	'id_user'=>$id_user
	)
	);
}
		catch( Exception $e )
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
			
			
			$select_existe_poste = DataBase::connect()->query("select * from poste where poste='$poste'");
		
		if($select_existe_poste->rowCount()==0)
		{
				$insert_poste = DataBase::connect()->prepare('insert into poste VALUES
		(NULL,:poste,:id_user)');
try {		
	$ins_poste = $insert_poste->execute(
	array(
	'poste'=>$poste,
	'id_user'=>$id_user
	)
	);
}
		catch( Exception $e )
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
		}
			
		
		return true;
		
	}
	
	public function modifier_personnel($id_p,$poste,$ncin,$email,$tel,$nom,$prenom,$id_departement)
	{
	
		$up = DataBase::connect()->prepare('update  personnel SET
		poste=:poste,ncin=:ncin,email=:email,tel=:tel,nom=:nom,prenom=:prenom,id_departement=:id_departement where id_personnel=:id_personnel');
try {		
	$update = $up->execute(
	array(
	'poste'=>$poste,
	'ncin'=>$ncin,
	'email'=>$email,
	'tel'=>$tel,
	'nom'=>$nom,
	'prenom'=>$prenom,
	'id_departement'=>$id_departement,
	'id_personnel'=>$id_p
	)
	);
	
}
		catch( Exception $e )
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
			
		return true;
		
	}
	
	public function select_departement()
	{
		$select = DataBase::connect()->query('select * from departement');
		
		echo "<select class='form-control' name='departement'>";
		while($donnes = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_departement = $donnes->id_departement;
			$departement = $donnes->departement;
			
			
			echo "<option value=$id_departement>".$departement."</option>";
			
		}
		echo "</select>";
	}
	
	
	public function check_departement($id)
	{
		$select = DataBase::connect()->query("select * from departement");
		
		echo "<select class='form-control' name='departement'>";
		while($donnes = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_departement = $donnes->id_departement;
			$departement = $donnes->departement;
			
			if($id_departement==$id)
			{
				echo "<option selected value=$id_departement>".$departement."</option>";
			}
			else 
			{
					echo "<option  value=$id_departement>".$departement."</option>";
			
			}
		}
		echo "</select>";
	}
	
	public function liste_personnel($id_user)
	{
		$select = DataBase::connect()->query("select * from personnel where id_user='$id_user' ORDER BY id_personnel DESC");
		
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_personnel= $donnees->id_personnel;
			$nom= $donnees->nom;
			$prenom= $donnees->prenom;
			$poste= $donnees->poste;
			echo "<tr>";
			echo "<td>";
			echo $id_personnel;
			echo "</td>";
			echo "<td>";
			echo $nom." ".$prenom;
			echo "</td>";
			echo "<td>";
			echo $poste;
			echo "</td>";
			echo "<td>";
			echo "<a href='consulter_personnel.php?id=$id_personnel'>"; 
			echo " <img src='img/chercher.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='modifier_personnel.php?id=$id_personnel'>"; 
			echo " <img src='img/modif.jpg' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='supprimer_personnel.php?id=$id_personnel'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer le Personnel: ".$nom." ".$prenom." ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/del.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
		}
	}
	
	
	
	public function select_personnel($id)
	{
		
		$select = DataBase::connect()->query("select * from personnel as p INNER JOIN departement as d ON p.id_departement=d.id_departement where id_personnel=$id");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;
		
	}
	
	public function chercher_personnel($id_user,$personnel)
	{	
	
	if($personnel!=NULL){
		$select = DataBase::connect()->query("select * from personnel  where (id_user=$id_user) and  (nom like '%$personnel%' or prenom like '%$personnel%')");
		if($select->rowcount()>0){
			echo"<br><br><table class='table table-responsive table-bordered table-hover'>";
		echo "<thead>
		<tr>
		<th>ID</th><th>Nom & Prenom</th><th>Poste</th><th></th><th></th><th></th>
		</tr>
		</thead>";
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_personnel= $donnees->id_personnel;
			$id_u= $donnees->id_user;
			$nom= $donnees->nom;
			$prenom= $donnees->prenom;
			$poste= $donnees->poste;
			
			echo "<tr>";
			echo "<td>";
			echo $id_personnel;
			echo "</td>";
			echo "<td>";
			echo $nom." ".$prenom;
			echo "</td>";
			echo "<td>";
			echo $poste;
			echo "</td>";
			echo "<td>";
			echo "<a href='consulter_personnel.php?id=$id_personnel'>"; 
			echo " <img src='img/chercher.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='modifier_personnel.php?id=$id_personnel'>"; 
			echo " <img src='img/modif.jpg' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='supprimer_personnel.php?id=$id_personnel'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer le Personnel: ".$nom." ".$prenom." ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/del.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
			
		}
		echo "</table>";
		} else 
		{
			echo "<br><br><center><h4>Aucun resultat</center></h4>";
		}
	
	}
	
	
	
	}
	
	
	
	
	
	
	
	public function supprimer_personnel($id)
	{
		$delete = DataBase::connect()->query("delete from personnel where id_personnel=$id");
		if($delete)
		{
			return true;
		}
	}
	
	
	
	public function chercher_personnel_pointage($id_user,$personnel)
	{	
	if($personnel!=NULL){
		$select = DataBase::connect()->query("select * from personnel  where (id_user=$id_user) and  (nom like '%$personnel%' or prenom like '%$personnel%')");
		if($select->rowcount()>0){
			echo"<br><br><table class='table table-responsive table-bordered table-hover'>";
		echo "<thead>
		<tr>
		<th>ID</th><th>Nom & Prenom</th><th>Poste</th><th></th>
		</tr>
		</thead>";
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_personnel= $donnees->id_personnel;
			$nom= $donnees->nom;
			$prenom= $donnees->prenom;
			$poste= $donnees->poste;
			echo "<tr>";
			echo "<td>";
			echo $id_personnel;
			echo "</td>";
			echo "<td>";
			echo $nom." ".$prenom;
			echo "</td>";
			echo "<td>";
			echo $poste;
			echo "</td>";
			echo "<td>";
			echo "<a href='afficher_pointage.php?id=$id_personnel'>"; 
			echo " Pointage </a>";                    
			echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
		} else 
		{
			echo "<br><br><center><h4>Aucun resultat</center></h4>";
	}}
	}
	
	public function total_personnel($id_user)
	{
		$select = DataBase::connect()->query("select * from personnel where id_user='$id_user' ORDER BY id_personnel DESC");
		
		$nbr = $select->rowcount();
		
		return $nbr;
	}
	
	
	
 
	
	
	public function affichage()
	{
	
	if(isset($_GET["message"])) {
		$msg = $_GET["message"];
		if($msg=='delete')
	{
		$message ="<div class='alert alert-success alert-dismissable'>
   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
      &times;
   </button>Supression avec succées</div>";
	} 
	if($msg=='add')
	{
		
		$message ="<div class='alert alert-success alert-dismissable'>
   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
      &times;
   </button>Ajout avec succées</div>";
	}

	if($msg=='update')
		{
			
		$message ="<div class='alert alert-success alert-dismissable'>
   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
      &times;
   </button>Modification avec succées</div>";
			}

	} 	else 
			{
			$message = "";
		}
	
			echo $message ;

	}
	
}

 
 
?>