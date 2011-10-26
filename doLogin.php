<?php
include_once('db_include.php');

$un = mysql_escape_string($_POST['username']);
$pw = mysql_escape_string($_POST['password']);

$attempt = mysql_query("select * from users where username='$un' AND password='$pw'");

if(mysql_num_rows($attempt) > 0){
    $unRow = mysql_fetch_assoc($attempt);
    $_SESSION['userID'] = $unRow[id];
    $_SESSION['name'] = $unRow[name];
    $_SESSION['progress'] = 0;

    header("Location: /vote.php");
}else{
    header("Location: /index.php");
    $_SESSION['flash'] = "Invalid User Name or Password ($un/$pw)";
}
?>