<?php
$xml = simplexml_load_file("scoreboard.xml"); // Replace 'data.xml' with the path to your XML file

if (isset($xml)) {
    echo "<h2>" . $xml->team->matchWithANB->title."</h2>";
    echo "<h2>" . $xml->team->matchWithANB->status."</h2>";
    echo "<h2>" . $xml->team->matchWithANB->statusNow."</h2>";
    echo "<h2>" . $xml->team->matchWithANB->date."</h2>";
} else {
    echo "<error>Failed to load XML data</error>";
}
?>
