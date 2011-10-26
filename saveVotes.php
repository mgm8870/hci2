<?php
include_once('db_include.php');
$presSelection = $_GET['pres'];
$senSelection = $_GET['sen'];

$pq = "insert into votes (user_id, candidate_id) VALUES('$_SESSION[userID]', '$presSelection')";
$presRes = mysql_query($pq);
$senRes = mysql_query("insert into votes (user_id, candidate_id) VALUES('$_SESSION[userID]', '$senSelection')");

if($presRes && $senRes){
  echo "<div id=\"thanks\"><h1>Thank You!</h1><h2>Your voice has been heard!</h2></div>";
}else{
  echo "failed!";
}