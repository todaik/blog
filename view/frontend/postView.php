<header class="masthead">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="post-heading">
					
					<h1><?php $titlePage = $post['title']; echo $titlePage;?></h1>
					<h3><?=$post['abstract'];?></h3>
				</div>
				<p><a href="index.php?action=listPosts">retour à la liste des billets</a></p>
			</div>
		</div>
	</div>	
</header>

<?php ob_start();?>        

<article>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">			        
				<p>le <?= $post['newdatepost']; ?></p>     
				<p><?= $post['content'];?></p>		
			</div>
		</div>
	</div>
</article>

	<div class="row">
		<h2>Commentaires</h2>
		<form action="index.php?action=addComment&amp;id=<?= $post['id']?>" method="post" class="form-inline">
			<div class="control-group">
				<div class="form-group floating-label-form-group controls" >
					<label class="sr-only" for="author">Auteur</label><br/>
					<input type="text" name="author" id="author" class="form-group" placeholder="Pseudo" required data-validation-required-message="Please enter votre pseudo.">
					<p class="help-block text-danger"></p>
				</div>
			</div>

			<div class="control-group">
				<div class="form-group floating-label-form-group controls" >
					<label for="comment">Commentaire</label><br/>
					<textarea rows="5" class="form-control" name="comment" id="comment" placeholder="Ajoute ton commentaire ici" required data-validation-required-message="Please enter a message."></textarea>
					<p class="help-block text-danger"></p>
				</div>
			</div>
			<div id="success"></div>
			<div class="form-group" >
				<br/>
				<input type="submit" value="Envoyer" class="btn btn-secondary">
				<p class="help-block text-danger"></p>
			</div>
			
		</form>
	</div>	



<div class="container">
	<div class="row">
		<?php
		while($comment=$comments->fetch()) {
		?>
			<div class="col-lg-8 col-md-10 mx-auto">
				<p>le <?=htmlspecialchars($comment['newdatecomment'])?> <strong><?=htmlspecialchars($comment['author'])?></strong> a écrit  : <?=htmlspecialchars($comment['comment'])?>&nbsp;&nbsp;&nbsp;<a href="index.php?action=addComment&amp;id=<?= $post['id']?>&amp;signal=ok">signaler</a></p>
			</div>
		<?php
		}
		?>

		<?php $contentPage = ob_get_clean(); ?>
	</div>
	
</div>



<?php require('template.php'); ?> 