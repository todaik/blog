<?php $titlePage ='Ajouter un  article';?>
<h1>Ajouter un article</h1>

 
<?php ob_start();?>        

<p><a href="index.php?action=logon">retour à l'ecran d'administration</a></p>
<h2>Billet</h2>

<div>
	<form action="" method="post" onsubmit="window.open('public/confirmpost.php','popup','width=120,height=40,left=200,top=200,scrollbars=1')">
		<label for="addTitle">Titre:</label><input type="text" name="addTitle" placeholder="Insère ton titre"><br><br>
		<label for="addContent">Billet:</label><textarea id="addContent"  placeholder="Insère ton billet ici" rows="20" cols="60" name="addContent" ></textarea><br><br><br>
		<input type="submit" name="addPost" value="Ajouter" class="monbouton">	
	</form>
</div>


<?php $contentPage = ob_get_clean(); ?>
<?php require('template.php'); ?> 