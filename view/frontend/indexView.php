<?php $titlePage = "Voyage en Alaska"; ?>
<header class="masthead" style="background-image: url('vendor/alaska1.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>"L'Alaska, mon beau pays"</h1>
                    <span class="subheading">Rédigé par Jean Forteroche</span>
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
						    <h2><?=$data['title']; ?></h2>
						    <p class="post-meta">le <?= $data['newdatepost']; ?></p>
						    <h4 class="post-subtitle"><?= mb_strimwidth($data['content'], 0,200,"...");?></h4> <br/>   
						    <hr> 
						</div>
					<?php
					}
						$posts->closeCursor();
					?>
					<nav aria-label="Page navigation">
						<ul class="pagination pagination-lg  justify-content-center">
							<?php
								for($i=1; $i <= $countPage ; $i++){
									if($i==$pagecourante){
										echo '<li class="page-item disabled"><a class="page-link"href="index.php?page='.$i.'">'.$i.'<a/></li>';
									}
									else{
										echo '<li class="page-item"><a class="page-link"href="index.php?page='.$i.'">'.$i.'<a/></li>';
									}
								}
							?>
						</ul>
					</nav>
					<?php $contentPage = ob_get_clean(); ?>	
				</div>
			</div>
			

	<div class="clearfix visible-sm-block"></div>

	
</article>




<?php require('template.php'); ?> 