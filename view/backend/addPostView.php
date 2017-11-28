<?php $titlePage ='Ajouter un  article';?>
<header class="masthead" style="background-image: url('vendor/alaska4.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>Ajouter un nouvel article</h1>
                    <span class="subheading">Citation Jules Vernes : "Ce ne sont pas de nouveaux continents qu'il faut à la terre, mais de nouveaux hommes!"</span> 
                </div>
            </div>
        </div>
    </div>  
</header>

 
<?php ob_start();?>        

<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
			<form action="" method="post" class="form-inline" novalidate>
				<div class="control-group">
					<div class="form-group floating-label-form-group controls">
						<label class="sr-only" for="addTitle">Titre:</label>
						<input type="text" class="form-group" name="addTitle" placeholder="Insère ton titre" required data-validation-required-message="Entrez le titre.">
						<p class="help-block text-danger"></p>
					</div>
				</div>
				
				
				<div class="control-group">
					<div class="form-group col-xs-12 floating-label-form-group controls">
						<label for="addContent">Billet:</label>
						<textarea id="addContent"  placeholder="Insère ton billet ici" rows="20" cols="600"  name="addContent" >Vous pouvez écrire l'article ici.</textarea>
						<p class="help-block text-danger"></p>
					</div>
				</div>
				<br>
				<div id="success"></div>
				<div class="control-group">
					<div class="form-group ">
						<input type="submit" name="addPost" value="Ajouter" class="btn btn-secondary">
					</div>
				</div>
				<div class="control-group">
					<div class="form-group col-lg-2">
						<a href="index.php?action=logon" class="btn btn-secondary">liste des articles</a>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="">
							<?php if(isset($_POST['addPost'])&& isset($_POST['addTitle'])&& isset($_POST['addContent'])&& isset($_POST['addAbstract'])){echo $_SESSION['message'];}?>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


<?php $contentPage = ob_get_clean(); ?>
<?php require('template.php'); ?> 