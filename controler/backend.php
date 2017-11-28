<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');


function formConnect()
{
	require('view/backend/connectView.php');
}

function logOn()
{
	
	if(isset($_SESSION['connect']) && $_SESSION['connect']==TRUE) {
		$postManager = new PostManager();
		$commentManager = new CommentManager();

		$posts = $postManager->getPosts(0,20);
		$totalPost = $postManager->countPosts();

		$totalPostsVisible = $postManager->countPostsVisible();
		$totalPostsNotVisible = $postManager->countPostsNotVisible();
		$totalComments = $commentManager->countComments();
		$totalSignaled = $commentManager->countSignaledComments();
		
		require('view/backend/indexView.php');
	}
	else{
		header("Location:index.php?action=connexion");
	}
}

function logOff()
{
	session_start();
	$_SESSION = array();
	session_destroy();
	header("Location: index.php");
}

function backPost()
{
	if(isset($_SESSION['connect']) && $_SESSION['connect']==TRUE) {
		$postManager = new PostManager();
		if (isset($_GET['id']) && $_GET['id']>0) {
			$post = $postManager->getPost($_GET['id']);
			require("view/backend/postView.php");
		}
	}
	else {
		header("Location:index.php?action=connexion");
	}
	
}

function updatePost()
{
	if(isset($_SESSION['connect']) && $_SESSION['connect']==TRUE) {
		$postManager = new PostManager();
		if(isset($_POST['updatePost'])) {
			
			$post = $postManager->doUpdatePost($_GET['id'],$_POST['newtitle'],$_POST['newcontent'],$_POST['newstatepost']);

			$_SESSION['message']="La modification a été réalisée avec succès !";
		}
	}
	else {
		header("Location:index.php?action=connexion");
	}
}

function deletePost()
{
	if(isset($_SESSION['connect']) && $_SESSION['connect']==TRUE) {	
		$postManager = new PostManager();
		$commentManager = new CommentManager();
		
		$commentManager->doDeleteComments($_GET['id']);
		$postManager->doDeletePost($_GET['id']);
		
		header("Location:index.php?action=logon");
		
	}
	else {
		header("Location:index.php?action=connexion");
	}
}

function listCommentSignaled()
{
	if(isset($_SESSION['connect']) && $_SESSION['connect']==TRUE) {	
		$commentManager = new CommentManager();
		$comments = $commentManager->getSignaledComments();
		require("view/backend/commentsView.php");
	}
	else {
		header("Location:index.php?action=connexion");
	}
}

function deleteComment()
{
	$commentManager = new CommentManager();
	$comment = $commentManager->doDeleteComment($_GET['id']);
	header("Location:index.php?action=listcomment");
}

function approveComment()
{
	if(isset($_SESSION['connect']) && $_SESSION['connect']==TRUE) {
		$commentManager = new CommentManager();
		$comment = $commentManager->doApproveComment($_GET['id']);
		header("Location:index.php?action=listcomment");
	}
	else {
		header("Location:index.php?action=connexion");
	}
}


function adminConnect()
{
	$userManager = new UserManager();
	$user = $userManager->isUserAdmin($_POST['pseudoconnect'],$_POST['mdpconnect']);
	if($user == TRUE) {
		$_SESSION['connect']= TRUE; 
		header("Location:index.php?action=logon");
	}
	else {
		throw new Exception("erreur de connexion !");
	}
}


function addPost()
{
	if(isset($_SESSION['connect']) && $_SESSION['connect']==TRUE) {	
		require("view/backend/addPostView.php");
		$postManager = new PostManager();
		if(isset($_POST['addPost'])) {
			if(!empty($_POST['addTitle']) && !empty($_POST['addContent'])) {
				
				$post = $postManager->doAddPost($_POST['addTitle'],$_POST['addContent']);
				$_SESSION['message']="La création du nouvel article a été réalisé avec succès !";
				header("Location:index.php?action=logon");
			}
			else {
				throw new Exception("Tous les champs sont obligatoires !");
				
			}
			
		}
	}
	else {
		header("Location:index.php?action=connexion");
	}
}

