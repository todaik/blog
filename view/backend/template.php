<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title><?= $titlePage ?></title>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href="public/css/clean-blog.min.css" rel="stylesheet"/>

        
        

        <script type ="text/javascript" src="public\plugin\tinymce\js\tinymce\jquery.tinymce.min.js"></script>
        <script type ="text/javascript" src="public\plugin\tinymce\js\tinymce\tinymce.min.js"></script>

        <script>
            tinymce.init({ selector:'textarea',
                        language: 'fr_FR', height:"550"  });
        </script>
    </head>
 
    <body>
        
        <div class="container">
        <?= $contentPage ?>
        </div>
        <footer>
         <hr>
        <footer>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-md-10 mx-auto">
                <p class="copyright text-muted"><a href="index.php?action=logoff">Déconnexion</a></p>
                <p class="copyright text-muted">Copyright &copy; By Todaik tous droits réservés</p>
              </div>
            </div>
          </div>
        </footer>   
        </footer>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <script src="public/js/clean-blog.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
    </body>
 
</html>