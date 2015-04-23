<html>
<style>table,td{border:1px solid black;}</style>

<body>
<h1>Test Status Page</h1><br>
<table>

<?php
$f = fopen(__DIR__ . "/resources/dataTest.csv", "r");

if($f == false){
	echo "ERROR: Unable to open dataTest.csv!<br>";
	exit;
}

$headers = fgetcsv($f);

$issues = array();
$issues[] = $headers;

while(($line = fgetcsv($f)) !== false) {
	$issues[]=$line;
}

$count = count($issues);

echo "<tr>";
foreach ($issues[0] as $cell){
	if($cell != "\n"){
		echo "<td>" . htmlspecialchars($cell) . "</td>";
	}
}
	echo "</tr>\n";


for($i = $count; $i>0; $i--){
	echo "<tr>";
	foreach ($issues[$i] as $cell){
		if($cell != "\n"){
			echo "<td>" . htmlspecialchars($cell) . "</td>";
		}
	}
	echo "</tr>\n";
}

fclose($f);
?>
</table>
</body>
</html>

