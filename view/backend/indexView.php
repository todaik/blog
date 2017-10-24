<?php $titlePage ='Adminstration';?>
<?php ob_start();?>
	<div align="center">
		<h1>Espace administration</h1>
		<br/>
		<p>Pseudo : <?= $_SESSION['pseudo'];?></p>
		<p>Mail : <?= $_SESSION['mail'];?></p>
		<hr/>	
	</div>
	<div>
		<form action="index.php?action=addpost" method="post">
			<input type="submit" name="addpost" value="Ecrire" class="monbouton"><br><br>
		</form>
	</div>
	
	<div class="divTable"  style="border: 2px solid #000;">
		
		<div class="divTableBody">
			<div class="divTableRow">
				<div class="divTableCell">n°</div>
				<div class="divTableCell">Dernière modification</div>
				<div class="divTableCell">Titre</div>
				<div class="divTableCell">Statut en ligne</div>
				<div class="divTableCell">Modifier/supprimer</div>
			</div>
				<?php
				while ($data = $posts->fetch())
				{
				?>
			<div class="divTableRow">
				<div class="divTableCell"><?= $data['id'];?></div>
				<div class="divTableCell"><?=$data['newdatepost'];?></div>
				<div class="divTableCell"><?=$data['title'];?></div>
				<div class="divTableCell"><?=$data['statepost'];?></div>
				<div class="divTableCell"><a href="index.php?action=updatepost&amp;id=<?=$data['id']?>">Accéder</a>
			
			</div>

		</div>
		<?php
  			}	
				$posts->closeCursor();
			?>
	</div>
					
	
  			
  		</tbody>
	</table>

<?php $contentPage = ob_get_clean(); ?>
<?php require('template.php'); ?> 