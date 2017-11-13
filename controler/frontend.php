<?php
require('model/frontend.php');

function listPosts()
{
	
	$posts = getPosts(0,20);
	require('view/frontend/indexView.php');
}


function post()
{
	
	if (isset($_GET['id']) && $_GET['id']>0) {
		$post = getPost($_GET['id']);
		$comments = getComments($_GET['id']);
		require("view/frontend/postView.php");
	}
	
}

function addComment($postId, $author, $comment)
{
	$affectedLines = postComment($postId, $author, $comment);

	if($affectedLines === false) {
		throw new Exception("Impossible d\'ajouter le commentaire !");
	}
	else {
		header('Location: index.php?action=post&id='.$postId);
	}
}

function doSignaledComment($postId)
{
	$affectedLines = incrementSignaledComment();

	if($affectedLines === false) {
		throw new Exception("Impossible de signaler le commentaire !");
	}
	else {
		header('Location: index.php?action=post&id='.$postId);
	}
}









