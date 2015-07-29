<?php
require_once("DataBase.php");
class conge
{
	public $now;
	
	public function __construct()
	{
		$this->now = date("Y-m-d");
	}
	
	public function liste_conge($id_user)
	{
		$select = DataBase::connect()->query("select * from personnel where id_user=$id_user  ORDER BY id_personnel DESC");
		
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			
			$id_personnel= $donnees->id_personnel;
			$nom= $donnees->nom;
			$prenom= $donnees->prenom;
			$poste= $donnees->poste;
			
	$select_c = DataBase::connect()->query("select * from conge where id_personnel='$id_personnel' ORDER BY id_conge DESC");
	$nbr=$select_c->rowCount();
		
		
			
		
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
			if($nbr>0){
			
			while($donnees_c = $select_c->fetch(PDO::FETCH_OBJ))
			{
				$fin= $donnees_c->fin;
				$debut= $donnees_c->debut;
			}
			
			if($this->now>$fin || $this->now<$debut)
			{
				echo "<td>";
				echo "Disponible";
				echo "</td>";
			} 
			else
			{
				echo "<td>";
				echo "En congé";
				echo "</td>";
			}
			
			}
			else
			{
				echo "<td>";
				echo "Disponible";
				echo "</td>";
			}
			
				echo "<td>";
				echo "<a href='ajouter_conge.php?id=$id_personnel'><img src='img/ajout.png' width='30' height='30'></a>";
				echo "</td>" ;
			echo "<td>";
			echo "<a href='afficher_conge.php?id=$id_personnel'>"; 
			echo " <img src='img/chercher.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
		}
	
	}
	
	
	
	public function liste_conge_id($id)
	{
		$select = DataBase::connect()->query("select * from conge where id_personnel='$id' ORDER BY id_conge DESC");
		
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_conge= $donnees->id_conge;
			$debut= $donnees->debut;
			$fin= $donnees->fin;
			$type= $donnees->type;
			echo "<tr>";
			echo "<td>";
			echo $type;
			echo "</td>";
			echo "<td>";
			echo $debut;
			echo "</td>";
			echo "<td>";
			echo $fin;
			echo "</td>";
			echo "<td>";
			echo "<a href='modifier_conge.php?id=$id&id_c=$id_conge'>"; 
			echo " <img src='img/modif.jpg' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='supprimer_conge.php?id=$id&id_conge=$id_conge'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer le congé ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/del.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
		}
	}
	
	
	public function ajouter_conge($id,$debut,$fin,$type)
	{
		
		$insert = DataBase::connect()->prepare('insert into conge VALUES
		(NULL,:type,:debut,:fin,:id)');
try {		
	$ins = $insert->execute(
	array(
	'debut'=>$debut,
	'fin'=>$fin,
	'id'=>$id,
	'type'=>$type
	)
	);
}
		catch( Exception $e )
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
			
		return true;
	}

 public function supprimer_conge($id)
 {
	 $delete = DataBase::connect()->query("delete from conge where id_conge=$id");
		if($delete)
		{
			return true;
		}
 }
	
	public function modifier_conge($id_c,$debut,$fin,$type,$id)
	{
		
		$insert = DataBase::connect()->prepare('update conge SET
		type=:type,debut=:debut,fin=:fin where id_conge=:id_c');
try {		
	$ins = $insert->execute(
	array(
	'debut'=>$debut,
	'fin'=>$fin,
	'id_c'=>$id_c,
	'type'=>$type
	)
	);
}
		catch( Exception $e )
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
			
		return true;
	}
	
	public function select_conge_id($id)
	{
		$select = DataBase::connect()->query("select * from conge where id_conge=$id");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;
	}
	
	public function total_conge($id_user)
	{
		$select = DataBase::connect()->query("select * from personnel where id_user=$id_user  ORDER BY id_personnel DESC");
		$nbr = 0;
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_personnel= $donnees->id_personnel;
			$nom= $donnees->nom;
			$prenom= $donnees->prenom;
			$poste= $donnees->poste;
			
		$select_c = DataBase::connect()->query("select * from conge where id_personnel='$id_personnel' ORDER BY id_conge DESC");
		
		while($donnees_c = $select_c->fetch(PDO::FETCH_OBJ))
			{
				$nbr= $nbr+1;
			}	
		}
		
		return $nbr;
	
	}

	
	public function liste_assiduite($id_user)
	{
		$select = DataBase::connect()->query("select * from personnel where id_user=$id_user  ORDER BY id_personnel DESC");
		
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			
			$id_personnel= $donnees->id_personnel;
			$nom= $donnees->nom;
			$prenom= $donnees->prenom;
			$poste= $donnees->poste;
			
	$select_c = DataBase::connect()->query("select * from conge where id_personnel='$id_personnel' ORDER BY id_conge DESC");
	$nbr=$select_c->rowCount();
		
		
			
		
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
			echo "<a href='afficher_assiduite.php?id=$id_personnel'>"; 
			echo " <img src='img/chercher.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
		}
	
}


public function afficher_assiduite($id_personnel)
	{
		$select = DataBase::connect()->query("select * from pointage where id_personnel=$id_personnel  ORDER BY id_pointage DESC");
		
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{	
			
			$date= $donnees->date_t;
			
		
		
			echo "<tr>";
			echo "<td>";
			echo $date;
			echo "</td>";
			echo "<td>";
			echo "présent";
			echo "</td>";
			
		}
	
	}
	




}




 
?>