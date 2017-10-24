<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        
        <title><?= $titlePage ?></title>
        <link href="public/css/style.css" rel="stylesheet"/>
        <link href="public/css/wbbtheme.css" rel="stylesheet"/>

        <script type ="text/javascript" src="public\plugin\tinymce\js\tinymce\jquery.tinymce.min.js"></script>
        <script type ="text/javascript" src="public\plugin\tinymce\js\tinymce\tinymce.min.js"></script>

        <script>tinymce.init({ selector:'textarea' });</script>
    </head>
    <header>

        <a href="editprofil.php">Editer mon profil</a>
        <a href="index.php?action=logoff">Se deconnecter</a>  
    </header> 
    <body>
        <?= $contentPage ?>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
    </body>
    <footer>
    	
    </footer>
</html>