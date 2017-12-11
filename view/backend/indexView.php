<?php $titlePage ='Adminstration';?>
<header class="masthead" style="">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Espace administration</h1>
                    <span class="subheading">Pseudo : <?= $_SESSION['pseudo'];?></span>
                    <span class="subheading">Mail : <?= $_SESSION['mail'];?></span>
                    <span class="subheading">Vous avez rédigé au total <?= $totalPost;?> articles avec <?= $totalPostsVisible;?> articles en ligne et  <?= $totalPostsNotVisible;?> encore en cours de rédaction </span>
                    <span class="subheading">Vous avez au total <?= $totalComments;?> commentaires rédigés sur tous vos articles dont <a href="index.php?action=listcomment"><?= $totalSignaled;?> ont été signalés</a></span>
                </div>
            </div>
        </div>
    </div>  
</header>

<?php ob_start();?>

<div class="container">
	<div class="row">
		<div class="">
			<?php 
				if(isset($_SESSION['message']) && !empty($_SESSION['message'])) { ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    	<span aria-hidden="true">&times;</span>
						  </button>
						 	<?=$_SESSION['message'];}?>
						 	<?php unset($_SESSION['message']); ?>
					</div>
		</div>
	</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
			<form action="index.php?action=addpost" method="post">
				<input type="submit" name="addpost" value="Ecrire" class="btn btn-secondary"><br><br>
			</form>
		</div>
	</div>
</div>

<div class="container">
    <div class="row">
    	<div class="col-lg-8 col-md-10 mx-auto">
    		<h2>Liste des articles</h2>
    		<table class="table table-bordered  table-hover"> 
		        <thead> 
		           	<tr> 
		          		<td>n°</td> 
		          		<td>Dernière modification</td> 
		          		<td>Titre</td> 
		          		<td>Statut en ligne</td>
		          		<td>Modifier/supprimer</td>
		          	</tr> 
		        </thead>
		        <?php
				while ($data = $posts->fetch()) {
				?>

		        <tbody> 
		          	<tr class=""> 
		          		<td><?= $data['id'];?></td> 
		          		<td><?=$data['newdatepost'];?></td>
		          		<td><?=$data['title'];?></td>
		          		<td><?=$data['statepost'];?></td> 
		          		<td><a href="index.php?action=updatepost&amp;id=<?=$data['id']?>">Accéder</a></td>
		          	</tr>
		          <?php
		  		  }
		  		  $posts->closeCursor();
		  		  ?>
		          
		        </tbody> 

		    </table>
		     	       
    	</div>
    </div>
</div>	
	
				

	</div>					
	  			
<?php $contentPage = ob_get_clean(); ?>
<?php require('template.php'); ?> 