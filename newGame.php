<?php

header("Location: http://localhost/open/chess/chess2test.php");
session_start();
include("dbConnect.php");
error_reporting(E_ALL);
echo '<!-- This routine clears the board and sets up for a new game -->
<!-- ROW  1 -->';
if (!$link) {
    die("Could not connect: " . mysql_error());
}
echo 'Connected successfully<br>';



//Функция заполнения таблицы названиями клеток
function addSquaresToTable($squareLetter) {
    for ($i = 8; $i >= 1; $i--) {
        $numSqr = $squareLetter . $i;
        $query = "INSERT INTO board (square)
           VALUES ('$numSqr')";
        $result = mysql_query($query);
    }
}

// добавить данные в таблицу
if ($link111) {        /// удалить "111" для работы
    //Очистить всю таблицу
    $query = "TRUNCATE TABLE board";
    $result = mysql_query($query);


    addSquaresToTable('a');
    addSquaresToTable('b');
    addSquaresToTable('c');
    addSquaresToTable('d');
    addSquaresToTable('e');
    addSquaresToTable('f');
    addSquaresToTable('g');
    addSquaresToTable('h');
}

function setFigures($piece,$square,$color) {
    $query = "UPDATE `board`
          SET `piece`='$piece'
          WHERE `square`='$square'";
    $result = mysql_query($query);
    
    $query2 = "UPDATE `board`
          SET `color`='$color'
          WHERE `square`='$square'";
    $result2 = mysql_query($query2);
}

function newGame() {
    setFigures("wr", "a1" ,"bbb");
    setFigures("wn", "b1" ,"www");
    setFigures("wb", "c1" ,"bbb");
    setFigures("wq", "d1" ,"www");
    setFigures("wk", "e1" ,"bbb");
    setFigures("wb", "f1" ,"www");
    setFigures("wn", "g1" ,"bbb");
    setFigures("wr", "h1" ,"www");
    echo '<!-- Row 2 -->';

    setFigures("wp", "a2" ,"www");
    setFigures("wp", "b2" ,"bbb");
    setFigures("wp", "c2" ,"www");
    setFigures("wp", "d2" ,"bbb");
    setFigures("wp", "e2" ,"www");
    setFigures("wp", "f2" ,"bbb");
    setFigures("wp", "g2" ,"www");
    setFigures("wp", "h2" ,"bbb");

    echo '<!-- Row 3 -->';

    setFigures(" ", "a3" ,"bbb");
    setFigures(" ", "b3" ,"www");
    setFigures(" ", "c3" ,"bbb");
    setFigures(" ", "d3" ,"www");
    setFigures(" ", "e3" ,"bbb");
    setFigures(" ", "f3" ,"www");
    setFigures(" ", "g3" ,"bbb");
    setFigures(" ", "h3" ,"www");

    echo '<!-- Row 4 -->';

    setFigures(" ", "a4" ,"www");
    setFigures(" ", "b4" ,"bbb");
    setFigures(" ", "c4" ,"www");
    setFigures(" ", "d4" ,"bbb");
    setFigures(" ", "e4" ,"www");
    setFigures(" ", "f4" ,"bbb");
    setFigures(" ", "g4" ,"www");
    setFigures(" ", "h4" ,"bbb");

    echo '<!-- Row 5 -->';

    setFigures(" ", "a5" ,"bbb");
    setFigures(" ", "b5" ,"www");
    setFigures(" ", "c5" ,"bbb");
    setFigures(" ", "d5" ,"www");
    setFigures(" ", "e5" ,"bbb");
    setFigures(" ", "f5" ,"www");
    setFigures(" ", "g5" ,"bbb");
    setFigures(" ", "h5" ,"www");

    echo '<!-- Row 6 -->';
    setFigures(" ", "a6" ,"www");
    setFigures(" ", "b6" ,"bbb");
    setFigures(" ", "c6" ,"www");
    setFigures(" ", "d6" ,"bbb");
    setFigures(" ", "e6" ,"www");
    setFigures(" ", "f6" ,"bbb");
    setFigures(" ", "g6" ,"www");
    setFigures(" ", "h6" ,"bbb");

    echo '<!-- Row 7 -->';

    setFigures("bp", "a7" ,"bbb");
    setFigures("bp", "b7" ,"www");
    setFigures("bp", "c7" ,"bbb");
    setFigures("bp", "d7" ,"www");
    setFigures("bp", "e7" ,"bbb");
    setFigures("bp", "f7" ,"www");
    setFigures("bp", "g7" ,"bbb");
    setFigures("bp", "h7" ,"www");

    echo '<!-- Row 8 -->';

    setFigures("br", "a8" ,"www");
    setFigures("bn", "b8" ,"bbb");
    setFigures("bb", "c8" ,"www");
    setFigures("bq", "d8" ,"bbb");
    setFigures("bk", "e8" ,"www");
    setFigures("bb", "f8" ,"bbb");
    setFigures("bn", "g8" ,"www");
    setFigures("br", "h8" ,"bbb");
}

if (isset($_POST['newGame'])) {
    newGame();
}


 
$currentGameSession = "game_".rand(0,999);
        if (isset($_POST['newGame'])) {
            $_SESSION['party'] = $currentGameSession;
            $query = "CREATE TABLE $currentGameSession (ID INT ,PRIMARY KEY(ID),move CHAR(8))";
            $result = mysql_query($query);
        }
mysql_close($link);
?>
 