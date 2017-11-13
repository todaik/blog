<header class="masthead" style="background-image: url('vendor/alaska1.jpg')">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="post-heading">
					
					<h1><?php $titlePage = $post['title']; echo $titlePage;?></h1>
					<h3><?=$post['abstract'];?></h3>
				</div>
				
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
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
			<h2>Commentaires</h2>
			<form action="index.php?action=addComment&amp;id=<?= $post['id']?>" method="post" class="form-inline" novalidate>
				<div class="control-group">
					<div class="form-group floating-label-form-group controls" >
						<label class="sr-only" for="author">Auteur</label>
						<input type="text" name="author" id="author" class="form-group" placeholder="Pseudo" required data-validation-required-message="Entrez votre pseudo.">
						<p class="help-block text-danger"></p>
					</div>
				</div>
				
				<div class="control-group">
					<div class="form-group floating-label-form-group controls" >
						<label for="comment">Commentaire</label>
						<textarea rows="5" class="form-control" name="comment" id="comment" placeholder="Ajoute ton commentaire ici" required data-validation-required-message="Entrez votre message."></textarea>
						<p class="help-block text-danger"></p>
					</div>
				</div>
				<br>
				<div id="success"></div>
				<div class="form-group" >
					<br/>
					<input type="submit" value="Envoyer" class="btn btn-secondary">
					<p class="help-block text-danger"></p>
				</div>	
			</form>
		</div>
	</div>
</div>




<div class="container">
	<div class="row">
		<?php
		while($comment=$comments->fetch()) {
		?>
			<div class="col-lg-8 col-md-10 mx-auto">
				<p>le <?=htmlspecialchars($comment['newdatecomment'])?> <strong><?=htmlspecialchars($comment['author'])?></strong> a écrit  : <?=htmlspecialchars($comment['comment'])?>&nbsp;&nbsp;&nbsp;<a href="index.php?action=signalComment&amp;id=<?= $comment['post_id']?>&amp;idComment=<?= $comment['id']?>">signaler</a></p>
			</div>
		<?php
		}
		?>

		<?php $contentPage = ob_get_clean(); ?>
	</div>	
</div>



<?php require('template.php'); ?> 