<?php
class UserManager
{
	public function getAdmin($pseudo,$mdp)
	{
		$db = $this->dbConnect();
		$reqAdmin = $db->prepare('SELECT * FROM user WHERE pseudo=:pseudo AND pass=:pass');
		$reqAdmin->execute(array('pseudo' => $pseudo,'pass'=>$mdp));
		return $reqAdmin;
	}

	function isUserAdmin($pseudo,$mdp)
	{
		$db = $this->dbConnect();
		$reqAdmin = $db->prepare('SELECT * FROM user WHERE pseudo=:pseudo AND pass=:pass');
		$reqAdmin->execute(array('pseudo' => $pseudo,'pass'=>sha1($mdp)));
		
		$adminExist = $reqAdmin->rowCount();

		if($adminExist == 1) {
			$adminInfo = $reqAdmin->fetch();
				
			$_SESSION['id'] = $adminInfo['id'];
	 		$_SESSION['pseudo'] = $adminInfo['pseudo'];
	 		$_SESSION['mail'] = $adminInfo['mail'];

	 		return TRUE;
		}

		else {
			return FALSE;
		}
	}



	protected function dbConnect()
	{
		$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE=>pdo::ERRMODE_EXCEPTION));
	    return $db;
	}
}
	