<?php $titlePage ='Adminstration';?>
<header class="masthead" style="">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Commentaires signalés</h1>

                    <span class="subheading"><a href="index.php?action=logon">Voir la liste de tous les articles</a></span>
                </div>
            </div>
        </div>
    </div>  
</header>

<?php ob_start();?>

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
    		<h2>Liste des commentaires</h2>
    		<table class="table table-bordered  table-hover"> 
		        <thead> 
		           	<tr> 
		          		<td>N° article associé</td> 
		          		<td>Date</td> 
		          		<td>Pseudo</td> 
		          		<td>Commentaire</td>
		          		<td>Nbre de signalement</td>
		          		<td>Remise à zéro</td>
		          		<td>supprimer</td>
		          	</tr> 
		        </thead>
		        <?php
				while ($data = $comments->fetch()) {
				?>

		        <tbody> 
		          	<tr class=""> 
		          		<td><a href="index.php?action=updatepost&amp;id=<?=$data['id']?>"><?= $data['post_id'];?></a></td> 
		          		<td><?=$data['newdatecomment'];?></td>
		          		<td><?=$data['author'];?></td>
		          		<td><?=$data['comment'];?></td>
		          		<td><?=$data['signaled'];?></td>
		          		<td><a href="index.php?action=approveComment&amp;id=<?=$data['id']?>">RAZ</a></td> 
		          		<td><a href="index.php?action=deleteComment&amp;id=<?=$data['id']?>">Supprimer</a></td>
		          	</tr>
		          <?php
		  		  }
		  		  $comments->closeCursor();
		  		  ?>
		          
		        </tbody> 

		    </table>
		     	       
    	</div>
    </div>
</div>	
	
				

	</div>					
	  			
<?php $contentPage = ob_get_clean(); ?>
<?php require('template.php'); ?> 