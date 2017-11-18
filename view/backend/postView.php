<?php $titlePage ='Editer un mon article';?>
<header class="masthead" style="background-image: url('vendor/alaska4.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
					<h1>Edition de "<?= htmlspecialchars($post['title']); ?>" </h1>
					<span class="subheading">Victor Hugo : "Le bonheur de vivre fait la gloire de mourir !"
					</span>
				</div>
            </div>
        </div>
    </div>  
</header>
 
<?php ob_start();?>        


<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
			<form action="index.php?action=updatepost&id=<?=$_GET['id']?>" method="post" class="form-inline" novalidate>
				<div class="control-group">
					<div class="form-group floating-label-form-group controls">	
						<label for="newtitle" class="sr-only">Titre:</label>
						<input type="text" name="newtitle" value="<?=$post['title']; ?>">
						<p class="help-block text-danger"></p>
					</div>
				</div>
				<br><br>
		
				<div class="control-group">
					<div class="form-group floating-label-form-group controls">
						<label for="newAddAbstract">Résumé:</label><br>
						<textarea  type="text" rows="5" cols="90" id="newAddAbstract"  name="newAddAbstract"><?= $post['abstract']; ?></textarea><br><br>
						<p class="help-block text-danger"></p>
					</div>
				</div>

				<div class="control-group">
					<div class="form-group floating-label-form-group controls">	
						<label for="newcontent">Billet:</label>
						<textarea id="newcontent"  rows="20" cols="90" name="newcontent" ><?=$post['content']; ?></textarea>
						<p class="help-block text-danger"></p>
					</div>
				</div>

				<div class="row">
					<div class="control-group">
						<div class="col-md-10 form-group floating-label-form-group controls">
							<label id="newstatepost">Etat de l'article :</label>
							<select name="newstatepost">
								<option <?php if($post['statepost']=='brouillon'){echo 'selected';}?>>brouillon</option>
								<option <?php if($post['statepost']=='visible'){echo 'selected';}?>>visible</option>		
							</select><br><br>
							<p class="help-block text-danger"></p>
						</div>
					</div>
				</div>
				<br><br>
				<div id="success"></div>
				<div class="control-group">
					<div class="form-group col-lg-2">
						<input type="submit" name="updatePost" value="modifier" class="btn btn-secondary">
					</div>
				</div>
				<div class="control-group">
					<div class="form-group col-lg-2 ">
						<input type="submit" name="deletePost" value="supprimer" class="btn btn-secondary">
					</div>
				</div>	
			</form>
		</div>
	</div>
</div>

<?php $contentPage = ob_get_clean(); ?>
<?php require('template.php'); ?> 