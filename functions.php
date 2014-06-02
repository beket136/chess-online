<?php

include 'dbConnect.php';

// функция для отрисовки доски

function boardDraw($piece, $piecePict, $pieceColor) 
{
    global $i;
    $result1 = mysql_query('SELECT * from board  ');
    if (mysql_result($result1, $i, 2) == "$piece") 
    {
        $colorClass = mysql_result($result1, $i, 3);
        echo "<td class='$colorClass $pieceColor' >  $piecePict </td>" . "\n";
    }
}
 


function chessOnTheBoard()
{
        $result = mysql_query('SELECT * from board  ');
       $numOfRows = mysql_num_rows($result); //64
        $num = 0;
       echo '<table class="board" > ';
       global $i;
       for ($b = 1; $b <= 8; $b++) 
       {                           // циклом рисуем доску и выводим названия шахмат при помощи функции boardDraw
           echo "<tr>";
           for ($i = $num; $i < $numOfRows; $i+=8) 
           {

               boardDraw("wr", "&#9814", "pieceColorW");
               boardDraw("wn", "&#9816", "pieceColorW");
               boardDraw("wb", "&#9815", "pieceColorW");
               boardDraw("wq", "&#9813", "pieceColorW");
               boardDraw("wk", "&#9812", "pieceColorW");
               boardDraw("wp", "&#9817", "pieceColorW");

               boardDraw(" ", " ", " ");

               boardDraw("br", "&#9820", "pieceColorB");
               boardDraw("bn", "&#9822", "pieceColorB");
               boardDraw("bb", "&#9821", "pieceColorB");
               boardDraw("bq", "&#9819", "pieceColorB");
               boardDraw("bk", "&#9818", "pieceColorB");
               boardDraw("bp", "&#9823", "pieceColorB");
           }
           $num++;
           echo "</tr>" . "\n";
       }
       echo ' </table> ';
}

?>
