<header class="row">
	<div class="col-md-12">
		<?php $titlePage ='Billet simple pour ALASKA';?>
		<h1>Oups! </h1>
		<p>Une erreur est survenue</p>
		<h2><?= $errorMessage; ?></h2>
	</div>
</header>


	<?php ob_start();?>        
	

	
	
	<?php $contentPage = ob_get_clean(); ?>	


<?php require('frontend/template.php'); ?> 