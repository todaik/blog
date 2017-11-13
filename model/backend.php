<?php
function getAdmin($pseudo,$mdp)
{
	$db = dbConnect();
	$reqAdmin = $db->prepare('SELECT * FROM user WHERE pseudo=:pseudo AND pass=:pass');
	$reqAdmin->execute(array('pseudo' => $pseudo,'pass'=>$mdp));
	return $reqAdmin;
}

function getPostsBack($offset, $limit)
{

	$db = dbConnect();
	$offset = (int) $offset;
    $limit = (int) $limit;
    
	$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(datepost, \'%d/%m/%Y à %Hh%imin%ss\') AS newdatepost, statepost FROM post ORDER BY datepost DESC LIMIT :offset, :limit');
	$req->bindParam(':offset', $offset, PDO::PARAM_INT);
    $req->bindParam(':limit', $limit, PDO::PARAM_INT);
	$req->execute();
		return $req;
}

function doUpdatePost()
{
	$db = dbConnect();
	$req = $db->prepare('UPDATE post SET title = :newtitle, content = :newcontent, abstract = :newabstract, datepost = NOW(),statepost = :newstatepost WHERE id =:id');
	$req->execute(array(
		'newtitle'=>$_POST['newtitle'],
		'newcontent'=>$_POST['newcontent'],
		'newabstract'=>$_POST['newAddAbstract'],
		'newstatepost'=>$_POST['newstatepost'],
		'id'=>$_GET['id']));
}



function doDeleteComments()
{
	$db = dbConnect();
	$message=$db->prepare('DELETE FROM comments WHERE post_id=?');
    $message->execute(array($_GET['id']));

}

function doDeletePost()
{
	$db = dbConnect();
	$message=$db->prepare('DELETE FROM post WHERE id=?');
    $message->execute(array($_GET['id']));

}

function doAddPost()
{
	$db = dbConnect();
	$req = $db->prepare('INSERT INTO post(title,content,abstract,datepost) VALUES (?,?,?,now())');
	$req->execute(array($_POST['addTitle'],$_POST['addContent'],$_POST['addAbstract']));
	
}

function countPosts($statepost)
{
	
	$db = dbConnect();
	$req = $db->prepare('SELECT COUNT(*) AS nbposts FROM post WHERE statepost=:statepost');
	$req->execute(array('statepost' => $statepost));
	$nbposts = $req->fetch();
	$nbposts = $nbposts['nbposts'];
	return $nbposts;
}

function isUserAdmin($pseudo,$mdp)
{
	$db = dbConnect();
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
	else
	{
		return FALSE;
	}
}