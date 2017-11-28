<?php
//require('model/frontend.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');


function listPosts()
{
	$postManager = new PostManager();
	$countPage = $postManager->countPage();
	$postByPage = 5;
	if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page']>0 AND $_GET['page']<=$countPage) {
        $_GET['page'] = intval($_GET['page']);
        $pagecourante = $_GET['page'];

    }
    else {
        
        header('Location: index.php?page=1');
    }

	$depart = ($pagecourante-1) * $postByPage;
	
	$posts = $postManager->getPostsVisible($depart,$postByPage);
	require('view/frontend/indexView.php');
}


function post()
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	if (isset($_GET['id']) && $_GET['id']>0) {
		$post = $postManager->getPost($_GET['id']);
		$comments = $commentManager->getComments($_GET['id']);
		require("view/frontend/postView.php");
	}
	
}

function addComment($postId, $author, $comment)
{
	$commentManager = new CommentManager();
	$affectedLines = $commentManager->postComment($_GET['id'], $_POST['author'], $_POST['comment']);

	if($affectedLines === false) {
		throw new Exception("Impossible d\'ajouter le commentaire !");
	}
	else {

		header('Location: index.php?action=post&id='.$postId);
	}
}

function doSignaledComment($postId)
{
	$commentManager = new CommentManager();
	$affectedLines = $commentManager->incrementSignaledComment($_GET['idComment']);

	$_SESSION['message']="Le signalement a été réalisé avec succès !";

	if($affectedLines === false) {
		throw new Exception("Impossible de signaler le commentaire !");
	}
	else {

		header('Location: index.php?action=post&id='.$postId);
		
	}
}











