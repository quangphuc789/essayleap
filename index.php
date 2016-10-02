<html>
    <head>
        <script src="js/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.min.css" >
        <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap-theme.min.css" >
        <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
    </head>


    <body>
        <?php
            include('backend/modules/logger.php');
            include('frontend/navbar.php');
            if (isLogged()) {
                include('frontend/welcomeBack.php');
            } else {
                include('frontend/welcome.php');
            }
        ?>

        <div>
            <h3>Popular topics</h3>

            <div id='popular-topics'>
                <table id='popular-table'>
                    <tr>
                        <th>Category</th>
                        <th>Exam</th>
                        <th>Text</th>
                        <th>Star</th>
                        <!-- <th>Tags</th> -->
                        <th>Timestamp</th>
                    </tr>
                </table>
            </div>
        </div>
    </body>

    <script src='js/index.js'></script>
    <script src='js/adhoc.js'></script>
</html>