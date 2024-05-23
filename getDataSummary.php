<?php
$xml = simplexml_load_file('scoreboard.xml'); // replace 'scoreboard.xml' with the name of your xml file

echo "<table class='text-center'>";
echo "<tr><th colspan='2'>".$xml->team->matchWithANB->teamOne."</th><th colspan='2'>".$xml->team->matchWithANB->teamTwo."</th></tr>";
echo "<tr><td>Batting</td><td>Bowling</td><td>Batting</td><td>Bowling</td></tr>";
echo "<table  margin-top='100px'>";

echo "<tr><th>Name</th><th>Over</th><th>Runs</th><th>Wicket</th></tr>";
$total_overs=0;
$total_runs=0;
$total_wickets=0;
$seletedPlayer=array();
$i=1;
$endRnd=100;
$count=0;
$rnd=rand($i,$endRnd);
$players = $xml->xpath('//teamB/players/player[@style="bowling"]');
//echo "<script>console.log($players.length)</script>";
foreach ($players as $boller) {
    echo "<tr class='text-center'>";
    //if(TCP_CON){}
    echo "<td>" . $boller->name."</td>";
    echo "<td>" . $boller->over . "</td>";
    echo "<td>" . $boller->runs . "</td>";
    echo "<td>" . $boller->wicket . "</td>";
    echo "</tr>";   
     $total_wickets += (int)$boller->wicket;
     $total_overs += (double)$boller->over;
     $total_runs+= (int)$boller->runs;
     $count=$count+1;
}
//echo $rnd;
$total = $xml->team->matchWithANB->total;
echo  '<th>Total</th>';
echo  "<th>".$total_overs."</th>";
echo  "<th>".$total."</th>";
echo  "<th>".$total_wickets."</th>";
echo '</tr>';
echo '<tr>';
if ($rnd >= 1 and $rnd < 20) {
    echo "<td colspan='4' class='table-danger text-center'>" . $players[0]->name . " is bollwing" . "</td>";
} else if ($rnd >= 20 and $rnd < 40) {
    echo "<td colspan='4' class='table-danger text-center'>" . $players[1]->name . " is bollwing" . "</td>";
} else if ($rnd >= 40 and $rnd < 60) {
    echo "<td colspan='4' class='table-danger text-center'>" . $players[2]->name . " is bollwing" . "</td>";
} else if ($rnd >= 60 and $rnd < 80) {
    echo "<td colspan='4' class='table-danger text-center'>" . $players[3]->name . " is bollwing" . "</td>";
} else if ($rnd >= 80 and $rnd <= 100) {
    echo "<td colspan='4' class='table-danger text-center'>" . $players[4]->name . " is bollwing" . "</td>";
}
echo '</tr>';
echo "</table>";
