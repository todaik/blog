<?php
function getPosts($offset, $limit)
{

	$db = dbConnect();
	$offset = (int) $offset;
    $limit = (int) $limit;
    
	$req = $db->prepare('SELECT id, title, content, abstract,DATE_FORMAT(datepost, \'%d/%m/%Y à %Hh%imin%ss\') AS newdatepost FROM post WHERE statepost=\'visible\' ORDER BY datepost DESC LIMIT :offset, :limit');
	$req->bindParam(':offset', $offset, PDO::PARAM_INT);
    $req->bindParam(':limit', $limit, PDO::PARAM_INT);
	$req->execute();
		return $req;
}

function getPost($postId)
{
	$db = dbConnect();
	$req = $db->prepare('SELECT id, title, content, abstract, DATE_FORMAT(datepost, \'%d/%m/%Y à %Hh%imin%ss\') AS newdatepost, statepost FROM post WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getComments($postId)
{
	$db = dbConnect();
	$comments = $db->prepare('SELECT id, post_id,author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS newdatecomment FROM comments WHERE post_id = ?');
    $comments->execute(array($postId));
   
    return $comments;
}

function postComment($postId, $author, $comment)
{
	$db = dbConnect();
	$comments = $db->prepare('INSERT INTO comments(post_id, author, comment,comment_date) VALUES (?,?,?, NOW())');
    $affectedLines = $comments->execute(array($postId, $author, $comment));
    return $affectedLines;
}

function incrementSignaledComment()
{
	$db = dbConnect();
	$req = $db->prepare('UPDATE comments SET signaled = signaled +1 WHERE id = :id');
	$req->execute(array('id'=>$_GET['idComment']));
}

function dbConnect()
{
	try
	{
	    $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE=>pdo::ERRMODE_EXCEPTION));
	    return $db;
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}
}