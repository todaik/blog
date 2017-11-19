<?php
//require('model/backend.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');


function formConnect()
{
	require('view/backend/connectView.php');
}

function logOn()
{
	
	if(isset($_SESSION['connect']) && $_SESSION['connect']=="1") {
		$PostManager = new PostManager();
		$CommentManager = new CommentManager();

		$posts = $PostManager->getPosts(0,20);
		$totalPost = $PostManager->countPosts();

		$totalPostsVisible = $PostManager->countPostsVisible();
		$totalPostsNotVisible = $PostManager->countPostsNotVisible();
		$totalComments = $CommentManager->countComments();
		$totalSignaled = $CommentManager->countSignaledComments();
		
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
	if(isset($_SESSION['connect']) && $_SESSION['connect']=="1") {
		$PostManager = new PostManager();
		if (isset($_GET['id']) && $_GET['id']>0) {
			$post = $PostManager->getPost($_GET['id']);
			require("view/backend/postView.php");
		}
	}
	else {
		header("Location:index.php?action=connexion");
	}
	
}

function updatePost()
{
	if(isset($_SESSION['connect']) && $_SESSION['connect']=="1") {
		$PostManager = new PostManager();
		if(isset($_POST['updatePost'])) {
			$post = $PostManager->doUpdatePost($_GET['id'],$_POST['newtitle'],$_POST['newAddAbstract'],$_POST['newcontent'],$_POST['newstatepost']);
		}
	}
	else {
		header("Location:index.php?action=connexion");
	}
}

function deletePost()
{
	if(isset($_SESSION['connect']) && $_SESSION['connect']=="1") {	
		$PostManager = new PostManager();
		$CommentManager = new CommentManager();
		if(isset($_POST['deletePost'])) {
			$comments = $CommentManager->doDeleteComments($_GET['id']);
			$post = $PostManager->doDeletePost($_GET['id']);
			header("Location:index.php?action=logon");
		}
	}
	else {
		header("Location:index.php?action=connexion");
	}
}

function listCommentSignaled()
{
	if(isset($_SESSION['connect']) && $_SESSION['connect']=="1") {	
		$CommentManager = new CommentManager();
		$comments = $CommentManager->getSignaledComments();
		require("view/backend/commentsView.php");
	}
	else {
		header("Location:index.php?action=connexion");
	}
}

function deleteComment()
{
	$CommentManager = new CommentManager();
	$comment = $CommentManager->doDeleteComment($_GET['id']);
	header("Location:index.php?action=listcomment");
}

function approveComment()
{
	if(isset($_SESSION['connect']) && $_SESSION['connect']=="1") {
		$CommentManager = new CommentManager();
		$comment = $CommentManager->doApproveComment($_GET['id']);
		header("Location:index.php?action=listcomment");
	}
	else {
		header("Location:index.php?action=connexion");
	}
}


function adminConnect()
{
	$UserManager = new UserManager();
	$user = $UserManager->isUserAdmin($_POST['pseudoconnect'],$_POST['mdpconnect']);
	if($user == TRUE) {
		$_SESSION['connect']=1; 
		header("Location:index.php?action=logon");
	}
	else {
		throw new Exception("erreur de connexion !");
	}
}


function addPost()
{
	if(isset($_SESSION['connect']) && $_SESSION['connect']=="1") {	
		require("view/backend/addPostView.php");
		$PostManager = new PostManager();
		if(isset($_POST['addPost'])) {
			if(!empty($_POST['addTitle']) && !empty($_POST['addContent']) && !empty($_POST['addAbstract'])) {
				$post = $PostManager->doAddPost($_POST['addTitle'],$_POST['addAbstract'],$_POST['addContent']);
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

