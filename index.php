<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>


    <body>
        <?php include('frontend/navbar.php') ?>
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
                } else {
                    require('login.php');
                }
            } else {
                require('login.php');
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