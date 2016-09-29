<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>


    <body>
        <?php
            include('frontend/navbar.php');
            include('backend/modules/logger.php');
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