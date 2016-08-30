<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/adhoc.js"></script>
        <link rel="stylesheet" type="text/css" href="css/topic.css">
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
    </body>

    <script src='js/topic.js'></script>
    <script type='text/javascript'>getTopicInfo("<?=$_GET['id']?>")</script>
</html>