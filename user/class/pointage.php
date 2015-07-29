<?php 
require_once("DataBase.php");
class pointage 
{
	public $now;
	public $mois;
	
	function __construct()
	{
			$this->now = date("Y-m-d");
			$this->mois =  date("m",strtotime($this->now));
	}
	
	public function liste_pointage($id)
	{
		$select = DataBase::connect()->query("select * from pointage where id_personnel=$id ORDER BY id_pointage DESC");
		
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_pointage = $donnees->id_pointage;
			$date_t = $donnees->date_t;
			$heur_e = $donnees->heur_e;
			$heur_s = $donnees->heur_s;
			$id_personnel = $donnees->id_personnel;
			
			echo"<tr>";
			
			echo"<td>";
			echo $date_t;
			echo"</td>";
			
			echo"<td>";
			echo $heur_e;
			echo"</td>";
			
			
			echo"<td>";
			if($heur_s!="00:00:00"){
			echo $heur_s;
			}
			echo"</td>";
			
			echo "<td>";
			echo "<a href='supprimer_pointage.php?id=$id_pointage&id_personnel=$id_personnel'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer le Pointage ? &quot;)) { return true; } return false;'>"; 
			echo " <img src='img/del.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo"</tr>";
			
		}
	}
	
	public function pointage_entre($id,$heur_e)
	{

		$insert = DataBase::connect()->prepare('insert into pointage VALUES
		(NULL,:date_t,:mois,:heur_e,:heur_s,:id_personnel)');
try {		
	$ins = $insert->execute(
	array(
	'date_t'=>$this->now,
	'mois'=>$this->mois,
	'heur_e'=>$heur_e,
	'heur_s'=>'',
	'id_personnel'=>$id
	)
	);
}
		catch( Exception $e )
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
			
		return true;
		
	}
	
	public function dernier_pointage($id)
	{
		$select = DataBase::connect()->query("select * from pointage where id_personnel=$id  ORDER BY id_pointage DESC limit 1");
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_pointage = $donnees->id_pointage;
		}
		
		return $id_pointage;
	}
	
	public function pointage_sortie($id_pointage,$heur_s)
	{

		$update = DataBase::connect()->prepare("update pointage SET
		heur_s=:heur_s where id_pointage=:id_pointage");
try {		
	$upd = $update->execute(
	array(
	
	'heur_s'=>$heur_s,

	'id_pointage'=>$id_pointage
	)
	);
}
		catch( Exception $e )
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
			
		return true;
		
	}
	
	 public function supprimer_pointage($id)
	 {
		 $delete = DataBase::connect()->query("delete from pointage where id_pointage=$id");
		if($delete)
		{
			return true;
		}
	 }
	 
	 public function total_heur($id_user)
	 {
		 $nbr_h=0;
		 $select = DataBase::connect()->query("select *,sum(heur_s-heur_e) as nbr  from pointage as p inner join personnel as pl on p.id_personnel=pl.id_personnel  ORDER BY id_pointage DESC");
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_pointage = $donnees->id_pointage;
			$date_t = $donnees->date_t;
			$heur_e = $donnees->heur_e;
			$heur_s = $donnees->heur_s;
			$nbr = $donnees->nbr;
			$mois = $donnees->mois;
		
			
		}
		
}
}




?>