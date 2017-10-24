<header class="row">
	<div class="col-md-12">
		<?php $titlePage ='Billet simple pour ALASKA';?>
		<h1>Oups! </h1>
		<p>Une erreur est survenue</p>
	</div>
</header>


	<?php ob_start();?>        
	
	<div class="news">
	    <?= $errorMessage; ?>
	</div>
	
	
	<?php $contentPage = ob_get_clean(); ?>	


<?php require('frontend/template.php'); ?> 