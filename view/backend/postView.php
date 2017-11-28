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
        <div class="col-xl-12 mx-auto">
			<form action="index.php?action=updatepost&id=<?=$_GET['id']?>" method="post" class="" novalidate>
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
						<label for="newcontent">Billet:</label>
						<textarea id="newcontent"   name="newcontent" ><?=$post['content']; ?></textarea>
						<p class="help-block text-danger"></p>
					</div>
				</div>
				<select name="newstatepost">
					<option <?php if($post['statepost']=='brouillon'){echo 'selected';}?>>brouillon</option>
					<option <?php if($post['statepost']=='visible'){echo 'selected';}?>>visible</option>		
				</select><br><br>
				<p class="help-block text-danger"></p>

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
				<div class="container">
					<div class="row">
						<div class="">
							<?php if(isset($_POST['updatePost'])){echo $_SESSION['message'];}?>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-lg-2">
							<a href="index.php?action=logon" class="btn btn-secondary">liste des articles</a>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>
<?php $contentPage = ob_get_clean(); ?>
<?php require('template.php'); ?> 