<?php $titlePage ='Editer un mon article';?>
<h1>Edition de "<?= htmlspecialchars($post['title']); ?>" </h1>

 
<?php ob_start();?>        

<p><a href="index.php?action=logon">retour à l'ecran d'administration</a></p>
<h2>Billet</h2>

<div>
	<form action="index.php?action=updatepost&id=<?=$_GET['id']?>" method="post">
		<label for="newtitle">Titre:</label><input type="text" name="newtitle" value="<?= htmlspecialchars($post['title']); ?>"><br><br>
		<label for="newcontent">Billet:</label><textarea id="newcontent"  rows="20" cols="60" name="newcontent" ><?= nl2br(htmlspecialchars($post['content'])); ?></textarea><br><br><br>
		<label id="newstatepost">Etat de l'article :</label>
		<select name="newstatepost">
			<option <?php if($post['statepost']=='brouillon'){echo 'selected';}?>>brouillon</option>
			<option <?php if($post['statepost']=='visible'){echo 'selected';}?>>visible</option>		
		</select><br><br><br>
		<input type="submit" name="updatePost" value="modifier" class="monbouton">
		<input type="submit" name="deletePost" value="supprimer" class="monbouton">	
	</form>
</div>


<?php $contentPage = ob_get_clean(); ?>
<?php require('template.php'); ?> 