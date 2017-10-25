<header class="masthead">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="post-heading">
					<?php $titlePage ='Billet simple pour ALASKA';?>
					<h1>Billet simple pour l'Alaska </h1>
					<h2>Mes derniers billets du blog :</h2>
				</div>
			</div>
		</div>
	</div>	
</header>

<article>
	<div class="container">
		<div class="row">
				<div class="col-lg-8 col-md-10 mx-auto">
		<?php ob_start();?>        
		<?php
		while ($data = $posts->fetch()) {
		?>
		<div class="post-preview">
		    <a href="index.php?action=post&amp;id=<?=$data['id']?>">
		    <h2>
		        <?=$data['title']; ?>
		    </h2>
		    <p class="post-meta">le <?= $data['newdatepost']; ?></p>
		    
		    <h3 class="post-subtitle">
		        <?= $data['abstract'];?>
		    </h3> <br/>   
		    
		   <hr> 
		</div>
			<?php
			}
			$posts->closeCursor();
			?>
			<?php $contentPage = ob_get_clean(); ?>	
	</div>
		</div>
	</div>


	<div class="clearfix visible-sm-block"></div>	
</article>




<?php require('template.php'); ?> 