<?php
require_once("DataBase.php");
class user
{

	public function __construct()
	{	
		
	}
	
	
	
	
	
	public function select_id($login)
	{
		$select = DataBase::connect()->query("select * from admin where login='$login'");
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id = $donnees->id_user;
		}
		
		
	session_name('SESSION1');
    session_start();
	$_SESSION['id'] =$id; 
		return $id;
	}
	
	
	
 public function login($login,$pass){
	$e= DataBase::connect()->query("select * from admin where login='$login' and pass=$pass ");
	$e= $e->rowCount();
	echo $e;
	if($e>0){
	return true;
	} else 
	{
	return false;
	}
 }
 

 
 public function changer_pass($npass,$login){
	
	
$MODIFIER = DataBase::connect()->prepare('UPDATE user SET
pass=:pass where login=:login');

try {
  
	$success = $MODIFIER->execute(array(
    'pass'=>$npass,
    'login'=>$login
    
  ));
  }
  catch( Exception $e )
   {
	  
	  echo 'Erreur de requète : ', $e->getMessage();
	
   }
	return true;
 }
	
	
 
 
 
 
  public function location($link){

  header('Location: '.$link);
 }
 
   public function value_session()
   {
	 session_name('SESSION1');
	 session_start();
	 $data = array();
	 $data['pass'] = $_SESSION['p'] ;
	 $data['login'] = $_SESSION['l'] ;
	 $data['id'] = $_SESSION['id'] ;
	
	
	 return $data ;
   }
 
 public function get_id()
 {
	 
	 session_name('SESSION1');
	 session_start();
	 
	 $id_user = $_SESSION['id'] ;

	 return $id_user ;
   
 }
 
  public function logout(){

  session_name('SESSION1');
  session_start();
  session_destroy(); 
	header ('location:../../index.php');
 }
 
 
 
 public function acceder($log,$id_u)
 {
	 
				session_name('SESSION1');
						
						$_SESSION['l'] =$log; 
						$_SESSION['id'] =$id_u;    
						
						
	 
 }
 
	public function contact($email,$sujet,$texte)
	 {
		
$insert = DataBase::connect()->prepare('insert into contact 
VALUES (NULL,:email,:sujet,:texte)');

try {
  
	$success = $insert->execute(array(
    'email'=>$email,
    'sujet'=>$sujet,
    'texte'=>$texte
  ));
  }
  catch( Exception $e )
   {
	  
	  echo 'Erreur de requète : ', $e->getMessage();
	
   }
	return true;
	 }
 
 
 
 
 }
 
 
 

 
 
?>