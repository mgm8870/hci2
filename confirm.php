<?php
include_once('db_include.php');

$presSelection = $_GET['pres'];
$senSelection = $_GET['sen'];

$presRes = mysql_query("select candidates.id, candidates.name as 'Candidate', summary,photo, parties.name as 'Party' from candidates left join parties on
                       parties.id = candidates.party_id where candidates.id='$presSelection'");
echo "<h1 class=\"electionName\">Presidential Election - Your Choice</h1>";
while($row = mysql_fetch_assoc($presRes)){
  echo "<div class=\"candidateProfile\">";
  echo "<img class=\"candidatePhoto\" src=\"/img/$row[photo]\" />";
  echo "<h1>$row[Candidate]</h1>";
  echo "<p class=\"candidateBio\">$row[summary]</p>";
  echo "<div style=\"clear:both\"></div>";
  echo "</div><br />";
}

$senRes = mysql_query("select candidates.id, candidates.name as 'Candidate', summary,photo, parties.name as 'Party' from candidates left join parties on
                       parties.id = candidates.party_id where candidates.id='$senSelection'");
echo "<h1 class=\"electionName\">Senatorial Election - Your Choice</h1>";
while($row = mysql_fetch_assoc($senRes)){
  echo "<div class=\"candidateProfile\">";
  echo "<img class=\"candidatePhoto\" src=\"/img/$row[photo]\" />";
  echo "<h1>$row[Candidate]</h1>";
  echo "<p class=\"candidateBio\">$row[summary]</p>";
  echo "<div style=\"clear:both\"></div>";
  echo "</div><br />";
}
?>