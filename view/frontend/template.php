<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $titlePage ?></title>
        <link href="public/css/clean-blog.css" rel="stylesheet"/> 
        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
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