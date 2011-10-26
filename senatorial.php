<?php
include_once('db_include.php');
$presRes = mysql_query("select candidates.id, candidates.name as 'Candidate', summary,photo, parties.name as 'Party' from candidates left join parties on
                       parties.id = candidates.party_id where election_type='sen'");
echo "<h1 class=\"electionName\">Senatorial Election</h1>";
while($row = mysql_fetch_assoc($presRes)){
  echo "<div class=\"candidateProfile\">";
  echo "<img class=\"candidatePhoto\" src=\"/img/$row[photo]\" />";
  echo "<h1>$row[Candidate] - <input type=\"radio\" class=\"radioSelector\" name=\"senatorialElection\" value=\"$row[id]\" /></h1>";
  echo "<p class=\"candidateBio\">$row[summary]</p>";
  echo "<div style=\"clear:both\"></div>";
  echo "</div><br />";
}