<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/adhoc.js"></script>
        <link rel="stylesheet" type="text/css" href="css/topic.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>

    <body>
        <h1>Topic <?=$_GET['id']?></h1>

        <div id='intro-topic'>
            <div>
                <table id='info-table'>
                    <tr>
                        <th>Category</th>
                        <td id='category'></td>
                    </tr>
                    <tr>
                        <th>Exam</th>
                        <td id='exam'></td>
                    </tr>
                    <tr>
                        <th>Star</th>
                        <td id='star'></td>
                    </tr>
                    <tr>
                        <th>Timestamp</th>
                        <td id='timestamp'></td>
                    </tr>
                </table>
                <div id='text'></div>
            </div>

            <div>
                <div id='essay-intro'></div>
                <div id='essay-list'></div>
            </div>
        </div>

        <div id='overlay-back' onclick="closeOverlay()"></div>
        <div id='overlay'>
            <div id='essay-title'></div>
            <div>
                <div id='essay-content'></div>
                <div id='essay-comment'</div>
            </div>
        </div>
    </body>

    <script src='js/topic.js'></script>
    <script type='text/javascript'>getTopicInfo("<?=$_GET['id']?>")</script>
</html>