<header class="row">
	<div class="col-md-12">
		<?php $titlePage ='Vue du billet';?>
		<h1>Billet simple pour l'Alaska </h1>
		<p>Mes derniers billets du blog :</p>
	</div>
</header>

<div class="row">
    <div class="col-sm-2">
      	<div class="row">
        	<aside class="col-md-12">
				<p><a href="index.php?action=listPosts">retour à la liste des billets</a></p>
            </aside>
            <aside class="col-md-12">
              	Aside
            </aside>
        </div>


	<?php ob_start();?>        

	<div class="col-sm-10 col-md-8">
		<h2>Billet</h2>
		<div>
		    <h3>
		        <?= htmlspecialchars($post['title']); ?>
		        <em>le <?= $post['newdatepost']; ?></em>
		    </h3> 
		    <p>
		    	<?= nl2br(htmlspecialchars($post['content']));?>   
		    </p>
		</div>	
	</div>


	<div class="row">
		<h2>Commentaires</h2>
		<form action="index.php?action=addComment&amp;id=<?= $post['id']?>" method="post" class="form-inline">
			<div >
				<label class="sr-only" for="author">Auteur</label><br/>
				<input type="text" name="author" id="author" class="form-group">
			</div>
			<div >
				<label for="comment">Commentaire</label><br/>
				<textarea name="comment" id="comment" placeholder="Ajoute ton commentaire ici"></textarea>
			</div>
			<div ><br/>
				<input type="submit" value="Envoyer">
			</div>
		</form>
	</div>	
</div>


<div class="row">
	<div>
		<?php
		while($comment=$comments->fetch()) {
		?>
			<div class="">
				<p>le <?=htmlspecialchars($comment['newdatecomment'])?> <strong><?=htmlspecialchars($comment['author'])?></strong> a écrit  : <?=htmlspecialchars($comment['comment'])?>&nbsp;&nbsp;&nbsp;<a href="">signaler</a></p>
			</div>
		<?php
		}
		?>

		<?php $contentPage = ob_get_clean(); ?>
	</div>
	
</div>



<?php require('template.php'); ?> 