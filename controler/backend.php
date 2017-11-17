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
	
	$PostManager = new PostManager();
	$posts = $PostManager->getPosts(0,20);
	require('view/backend/indexView.php');
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
	$PostManager = new PostManager();
	if (isset($_GET['id']) && $_GET['id']>0) {
		$post = $PostManager->getPost($_GET['id']);
		require("view/backend/postView.php");
	}
	
}

function updatePost()
{
	$PostManager = new PostManager();
	if(isset($_POST['updatePost'])) {
		$post = $PostManager->doUpdatePost($_GET['id'],$_POST['newtitle'],$_POST['newAddAbstract'],$_POST['newcontent'],$_POST['newstatepost']);
	}
}

function deletePost()
{
	$PostManager = new PostManager();
	$CommentManager = new CommentManager();
	if(isset($_POST['deletePost'])) {
		$comments = $CommentManager->doDeleteComments($_GET['id']);
		$post = $PostManager->doDeletePost($_GET['id']);
		header("Location:index.php?action=logon");
	}
}



function adminConnect()
{
	$UserManager = new UserManager();
	$user = $UserManager->isUserAdmin($_POST['pseudoconnect'],$_POST['mdpconnect']);
	if($user == TRUE) {
		header("Location:index.php?action=logon");
	}
	else {
		throw new Exception("erreur de connexion !");
	}
}


function addPost()
{
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

