<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $titlePage ?></title>
        <link href="public/css/style.css" rel="stylesheet"/> 
        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <script src="public/js/jquery.js"></script>
        
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
        
    <body>
        <div class="container">
            <?= $contentPage ?>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="public/js/bootstrap.min.js"></script>
    </body>
    <footer>
        <div class="col-md-12">
    	   <a href="index.php?action=connexion">Administration</a>
        </div>
    </footer>
</html>