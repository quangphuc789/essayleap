<html>
    <head>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/adhoc.js"></script>
        <link rel="stylesheet" type="text/css" href="css/topic.css">
        <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap-theme.min.css">
        <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
            include('backend/modules/logger.php');
            include('frontend/navbar.php');
        ?>
        <h1>Topic <?=$_GET['id']?></h1>

        <div class="md-col-8">
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
                <!-- <tr>
                    <td id='write'>
                        <button class="btn btn-default" onclick='attemptEssay()'>WRITE</button>
                    </td>
                </tr> -->
            </table>
            <div id='text'></div>
        </div>

        <div>
            <div id='essay-intro'></div>
            <div>
            <?php
                if (isLogged()) {
                    $id = $_GET['id'];
                    echo '<button class="btn btn-default" onclick="attemptEssay('.$id.')">WRITE</button>';
                } else {
                    echo 'Please login to write';
                }
            ?>
            </div>
            <div id='essay-list'></div>
        </div>

        <div id='overlay-back' onclick="closeOverlay()"></div>
        <div id='overlay'>
            <div id='essay-title'></div>
            <div>
                <div id='essay-content'></div>
                <div id='essay-info'></div>
                <div id='essay-comment'</div>
            </div>
        </div>
    </body>

    <script src='js/topic.js'></script>
    <script type='text/javascript'>getTopicInfo("<?=$_GET['id']?>")</script>
</html>