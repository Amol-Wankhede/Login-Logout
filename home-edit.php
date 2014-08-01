<?php
    session_start();
    if(isset($_SESSION['userId']) ) {

    }
    define("ORG_NAME", "COMPANY NAME");
    define("ORG_URL", "www.www.com");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home Page Edit  - <?php echo ORG_NAME ?></title>
    <script src="editor/assets/js/jquery.min.js"></script>
    <script src="editor/assets/js/jquery-ui.min.js"></script>
    <script src="editor/assets/js/elrte.min.js"></script>
    <script src="editor/assets/js/elfinder.min.js"></script>
    <link rel="stylesheet" type="text/css" href="editor/assets/css/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="editor/assets/css/elrte.min.css">
    <link rel="stylesheet" type="text/css" href="editor/assets/css/elfinder.min.css">
    <link rel="stylesheet" type="text/css" href="editor/assets/css/theme.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <script type="text/javascript">
    $().ready(function() {
        $('#elrte').elrte({
            fmOpen : function(callback) {
                $('<div/>').dialogelfinder({
                    url : 'editor/php/connector.php', // connector URL (REQUIRED)
                    commandsOptions: {
                        getfile: {
                            onlyURL : true,
                            oncomplete: 'destroy' // destroy elFinder after file selection
                        }
                    },
                    getFileCallback: callback // pass callback to editor
                });
            }
        });
    });
</script>
</head>
<body >
    <div class="container">
        <div class="row">
            <div class="span12 box">
                <h1>Home Page Edit</h1>
                <form action="savefile.php" method="POST">
                    <div id="elrte"></div>
                </form>
                <hr>
                <h5><a href="../index.php" target="_blank">Click Here to View Page</a></h5>
                <hr>
                <p>&copy; <?php echo ORG_NAME ?> | 2013</p>
            </div>
        </div>
    </div>
</body>
</html>