<?php
$username = "beket";
$password = "qaz123";
$dbase = "open";
$link = mysql_connect('localhost', $username, $password);
mysql_select_db($dbase, $link);
if (!$link) {
    die("Could not connect: " . mysql_error());
}
echo 'Connected successfully';
?>
