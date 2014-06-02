<?php

header("Location: http://localhost/open/chess/chess2test.php");
session_start();
include 'dbConnect.php';
$move = $_POST['move'];
$from = substr($move, 0, 2);
$to = substr($move, 2, 2);

if (isset($_POST["move"])) {
    $quary1 = mysql_query("SELECT * from board WHERE square='$from'");
    $res = mysql_fetch_assoc($quary1);
    $resUp = $res['piece'];

    $quary2 = "UPDATE board SET piece ='$resUp' WHERE square='$to' ";
    $result2 = mysql_query("UPDATE board SET piece ='$resUp' WHERE square='$to' ", $link);

    $quary3 = "UPDATE board SET piece='+' WHERE square='$from'";
    $result = mysql_query("UPDATE board SET piece=' ' WHERE square='$from'", $link);


    $currentGameSession = $_SESSION['party'];
    $querySave = "INSERT INTO $currentGameSession (move)
                VALUES ('{$move}') ";
    $resultSave = mysql_query($querySave);
}

//function saveMove()
//    {
//    global $currentGameSession;
//    echo "<br> $currentGameSession ";
//        if (isset($_POST["move"])) 
//            {
//            $query = 'INSERT INTO $currentGameSession (move)
//                VALUES ($_POST["move"]) where ID' ;
//            $result = mysql_query($query);
//
//            }
//
//    }
?>
