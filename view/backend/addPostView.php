<?php $titlePage ='Ajouter un  article';?>
<h1>Ajouter un article</h1>

 
<?php ob_start();?>        

<p><a href="index.php?action=logon">retour à l'ecran d'administration</a></p>
<h2>Billet</h2>

<div>
	<form action="" method="post">
		<label for="addTitle">Titre:</label><input type="text" name="addTitle" placeholder="Insère ton titre"><br><br>
		<label for="addAbstract">Résumé:</label><br><input  type="text" id="addAbstract"  placeholder="Insère ton résumé ici"  name="addAbstract" style="width: 300px; height: 200px;"><br><br><hr>
		<label for="addContent">Billet:</label><br><textarea id="addContent"  placeholder="Insère ton billet ici" rows="20" cols="60" name="addContent" ></textarea><br><br><br>
		<input type="submit" name="addPost" value="Ajouter" class="monbouton">	
	</form>
</div>


<?php $contentPage = ob_get_clean(); ?>
<?php require('template.php'); ?> 