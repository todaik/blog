<?php
//require('model/frontend.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');


function listPosts()
{
	$PostManager = new PostManager();
	$countPage = $PostManager->countPage();
	$postByPage = 5;
	if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page']>0 AND $_GET['page']<=$countPage) {
        $_GET['page'] = intval($_GET['page']);
        $pagecourante = $_GET['page'];

    }
    else {
        
        header('Location: index.php?page=1');
    }

	$depart = ($pagecourante-1) * $postByPage;
	
	$posts = $PostManager->getPostsVisible($depart,$postByPage);
	require('view/frontend/indexView.php');
}


function post()
{
	$PostManager = new PostManager();
	$CommentManager = new CommentManager();

	if (isset($_GET['id']) && $_GET['id']>0) {
		$post = $PostManager->getPost($_GET['id']);
		$comments = $CommentManager->getComments($_GET['id']);
		require("view/frontend/postView.php");
	}
	
}

function addComment($postId, $author, $comment)
{
	$CommentManager = new CommentManager();
	$affectedLines = $CommentManager->postComment($_GET['id'], $_POST['author'], $_POST['comment']);

	if($affectedLines === false) {
		throw new Exception("Impossible d\'ajouter le commentaire !");
	}
	else {
		header('Location: index.php?action=post&id='.$postId);
	}
}

function doSignaledComment($postId)
{
	$CommentManager = new CommentManager();
	$affectedLines = $CommentManager->incrementSignaledComment($_GET['idComment']);

	if($affectedLines === false) {
		throw new Exception("Impossible de signaler le commentaire !");
	}
	else {
		header('Location: index.php?action=post&id='.$postId);
	}
}











