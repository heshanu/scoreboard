<?php require_once 'connection.php';

$xml = simplexml_load_file('scoreboard.xml'); // replace 'scoreboard.xml' with the name of your xml file
$total_overs=0;

echo "<table class='text-center'>";
echo "<tr><th colspan='2'>" . $xml->team->matchWithANB->teamOne . "</th><th colspan='2'>" . $xml->team->matchWithANB->teamTwo . "</th></tr>";
echo "<tr><td>Batting</td><td>Bowling</td><td>Batting</td><td>Bowling</td></tr>";
echo "<table margin-top='100px'>";

foreach ($xml->team->matchWithANB->teamA->players->player as $player) {
    echo "<tr>";
    //echo "<td>" . $player['id'] . "</td>";
    echo "<td>" . $player->name . "</td>";
    echo "<td colspan='2'>" . $player->description . "</td>";
    echo "<td>" . $player->marks . "</td>";
    echo "</tr>";
}

$extra=$xml->team->matchWithANB->extras;
echo  '<th>Extras</th>';
echo  "<td colspan='2'></td>";
echo  '<td>'.$extra.'</td>';
echo '</tr>';
echo '<tr>';
$total = $xml->team->matchWithANB->total;
echo  '<th>Total:</th>';
echo  "<td colspan='2'></td>";
echo  '<td>' . $total. '</td>';
echo '</tr>';
echo "</table>";




   