<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>


    <body>
        <h1>Welcome to ESME!</h1>

        <p>ESME is the Community Learning Platform for English learners to write, learn and share.
            <br>
            You can find or create a topic you love, write your essay and get it reviewed by the community!
            <br>
            This way, we can share and learn from each other. Enjoy!
        </p>

        <?php
            require('backend/db/sql.php');
            if (isset($_COOKIE['id'])) {
                $id = $_COOKIE['id'];
                $sql = new Sql();
                $objs = $sql->query("SELECT * FROM session WHERE id = '$id' LIMIT 1");
                if (count($objs) > 0) {
                    $obj = $objs[0];
                    $expiry = intval($obj['expiry']);
                    if ($obj['expiry']-time() > 0) {
                        $GLOBALS['name'] = 'Phuc2';
                        require('userinfo.php');
                    } else {
                        require('login.php');
                    }
                }
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
                        <th>Tags</th>
                        <th>Timestamp</th>
                    </tr>
                </table>
            </div>
        </div>
    </body>

    <script src='js/index.js'></script>
    <script src='js/adhoc.js'></script>
</html>