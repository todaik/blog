<?php
require('model/backend.php');

function formConnect()
{
	require('view/backend/connectView.php');
}

function logOn()
{
	
	$posts = getPostsBack(0,20);
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
	
	if (isset($_GET['id']) && $_GET['id']>0) {
		$post = getPost($_GET['id']);
		require("view/backend/postView.php");
	}
	
}

function updatePost()
{
	if(isset($_POST['updatePost'])) {
		doUpdatePost();
	}
}



function adminConnect()
{
	
	if(isUserAdmin($_POST['pseudoconnect'],$_POST['mdpconnect'])) {
		header("Location:index.php?action=logon");
	}
	else {
		throw new Exception("erreur de connexion !");
	}
}


function addPost()
{
	require("view/backend/addPostView.php");
	if(isset($_POST['addPost'])) {
		if(!empty($_POST['addTitle']) && !empty($_POST['addContent'])) {
			doAddPost();
			header("Location:index.php?action=logon");
		}
		else {
			throw new Exception("Tous les champs sont obligatoires !");
			
		}
		
	}
}

