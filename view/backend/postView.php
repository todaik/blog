<?php $titlePage ='Editer un mon article';?>
<h1>Edition de "<?= htmlspecialchars($post['title']); ?>" </h1>

 
<?php ob_start();?>        

<p><a href="index.php?action=logon">retour à l'ecran d'administration</a></p>
<h2>Billet</h2>
<p>Etat de l'article : "<?=$post['statepost']; ?>"</p>
<div>
	<form action="index.php?action=updatepost&id=<?=$_GET['id']?>" method="post" onsubmit="window.open('public/confirmpost.php','popup','width=120,height=40,left=200,top=200,scrollbars=1')">
		<label for="newtitle">Titre:</label><input type="text" name="newtitle" value="<?= htmlspecialchars($post['title']); ?>"><br><br>
		<label for="newcontent">Billet:</label><textarea id="newcontent"  rows="20" cols="60" name="newcontent" ><?= nl2br(htmlspecialchars($post['content'])); ?></textarea><br><br><br>
		<label id="newstatepost">Etat de l'article :</label>
		<select name="newstatepost">
			<option>brouillon</option>
			<option>visible</option>
			<option>supprimer</option>
		</select><br><br><br>
		<input type="submit" name="updatePost" value="modifier" class="monbouton">
		<input type="submit" name="supprimer" value="supprimer" class="monbouton">	
	</form>
</div>


<?php $contentPage = ob_get_clean(); ?>
<?php require('template.php'); ?> 