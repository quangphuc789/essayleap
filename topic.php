<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/adhoc.js"></script>
    </head>

    <body>
        <h1>Topic <?=$_GET['id']?></h1>

        <div id='intro-topic'></div>
    </body>

    <script src='js/topic.js'></script>
    <script type='text/javascript'>getTopicInfo("<?=$_GET['id']?>")</script>
</html>