<header class="row">
	<div class="col-md-12">
		<?php $titlePage ='Billet simple pour ALASKA';?>
		<h1>Billet simple pour l'Alaska </h1>
		<p>Mes derniers billets du blog :</p>
	</div>
</header>

<div class="row">
    <div class="col-sm-2">
      	<div class="row">
        	<aside class="col-md-12">
				Aside
            </aside>
            <aside class="col-md-12">
              	Aside
            </aside>
        </div>
</div>

<div class="col-sm-10 col-md-8">
	<?php ob_start();?>        
	<?php
	while ($data = $posts->fetch()) {
	?>
	<div class="news">
	    <h3>
	        <?= htmlspecialchars($data['title']); ?>
	        <em>le <?= $data['newdatepost']; ?></em>
	    </h3>
	    
	    <p>
	        <?= nl2br(htmlspecialchars($data['content']));?> <br/>   
	        <em><a href="index.php?action=post&amp;id=<?=$data['id']?>">Commentaires</a></em>
	    </p>
	</div>
	<?php
	}
	$posts->closeCursor();
	?>
	<?php $contentPage = ob_get_clean(); ?>	
</div>

<div class="clearfix visible-sm-block"></div>

<div class="row">
    <div class="col-md-2">
      	<div class="row">
        	<aside class="col-md-12">
				Aside
            </aside>
            <aside class="col-md-12">
              	Aside
            </aside>
        </div>
</div>

<?php require('template.php'); ?> 