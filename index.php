<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <script src="js/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.min.css" >
        <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap-theme.min.css" >
        <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    </head>


    <body>
        <?php
            include('backend/modules/logger.php');
            include('frontend/navbar.php');
            if (isLogged()) {
                include('frontend/welcomeBack.php');
                include('frontend/mailing.php');
            } else {
                include('frontend/welcome.php');
            }
        ?>
    </body>

    <script src='js/adhoc.js'></script>
    <script src='js/mailing.js'></script>
</html>