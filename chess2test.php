<?php

session_start();
 
include 'dbConnect.php';
include 'functions.php';
 
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Шахматы</title>
        <link rel="stylesheet/less" type="text/css" href="styles/styles.less" />
        <script src="less-1.7.0.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">

            <?php
            chessOnTheBoard();
            ?>
            <div class="userInput">
                <form method="POST" action="moving.php" >
                    <input type="text" name="move" >
                    <input type="submit" > 
                </form>       

                <form method="POST" action="newGame.php" >
                    <input type="submit" name="newGame" value="New Game">
                </form>      
            </div>
        </div>

        <?php
        echo  'Вы в игре : № '.$_SESSION['party'];
        ?>

    </body>
</html>