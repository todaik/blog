<?php  
session_start();
require('controler/frontend.php');
require('controler/backend.php');


try{

	if(isset($_GET['action'])) {
		if($_GET['action'] == 'listPosts') {
			
			listPosts();
		}
		elseif($_GET['action'] == 'post') {
			
			if(isset($_GET['id']) && $_GET['id']>0) {
				post();

			}
			else {
				throw new Exception("aucun identifiant de billet envoyé");
								
			}
		}
		elseif($_GET['action'] == 'addComment') {
			if (isset($_GET['id']) && $_GET['id']>0) {	
				
				if (!empty($_POST['author']) && !empty($_POST['comment'])) {
				addComment($_GET['id'],$_POST['author'],$_POST['comment']);
				}
				else {
				throw new Exception("Tous les champs ne sont pas remplis !");
				}
				
				
			}
			else {
				throw new Exception("Aucun identifiant de billet envoyé");	
			}
		}
		elseif ($_GET['action'] == 'signalComment') {
			
			if (isset($_GET['idComment']) && $_GET['idComment']>0 && isset($_GET['id']) && $_GET['id']>0) {
				
				doSignaledComment($_GET['id']);
			}
			else {
				throw new Exception("Aucun identifiant de billet envoyé");
			}
		}
		elseif($_GET['action'] == 'connexion') {
			formConnect();
					
			if(isset($_POST['formconnexion'])) {
				
				if(!empty($_POST['pseudoconnect']) AND !empty($_POST['mdpconnect'])) {
					adminConnect();

				}
				else {
					throw new Exception("Tous les champs ne sont pas remplis !");
				}
			}
		}
		elseif($_GET['action'] == 'logon') {
			
			logOn();
			
		}
		elseif(($_GET['action'] == 'logoff')) {
			logOff();
		}
		elseif(($_GET['action'] == 'updatepost')) {
			
			if(isset($_GET['id']) && $_GET['id']>0) {
				updatePost();
				backPost();
				deletePost();
			}
		}
		elseif(($_GET['action'] == 'addpost')) {
			
			addPost();
		}
		elseif(($_GET['action'] == 'listcomment')) {
			listCommentSignaled();
		}
		elseif (($_GET['action'] == 'deleteComment')) {
			if (isset($_GET['id']) && $_GET['id']>0) {
				deleteComment();
			}
			
		}
		elseif (($_GET['action'] == 'approveComment')) {
			if (isset($_GET['id']) && $_GET['id']>0) {
				approveComment();
			}
			
		}
	
	}
	else {	
		listPosts();
	}

}
catch(Exception $e) { 
   $errorMessage = $e->getMessage();
   require('view/errorView.php');

}





