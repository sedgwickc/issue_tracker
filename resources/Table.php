<?php

/* Issue.class.php
 * Charles Sedgwick
 * Web Admin, Summer Student 
 * Email: csedgwic@ab.bluecross.ca 
 * 
 * Table.php contains the functions used to print and style the ASR environment
 * issue tracker tables. 
 */

/* setTableStyle()
 *
 * setTableStyle() defines how a table will look when printed using CSS.
 */

function printTable($dataFile){

	$f = fopen(__DIR__ . $dataFile, "r");

	if($f == false){
		echo "ERROR: Unable to open dataPER.csv!<br>";
		exit;
	}

	$headers = fgetcsv($f);

	if(empty($headers)){
		echo "ERROR: data file missing headers!<br>";
		exit;
	}

	// The contents of $issues will be what is printed once the csv file is processed
	$issues = array();
	$issues[] = $headers;

	while(($line = fgetcsv($f)) !== false) {
		$issues[]=$line;
	}

	/* use usort() to sort by index desc and status?
	** reverse the array and push the closed issues to the bottom. 
	** as you find a closed issue, make it the last issue in the array. 
	*/

	$count = count($issues);
	echo "<table><tr>";
	foreach ($issues[0] as $cell){
		if($cell != "\n"){
			echo '<th>' . htmlspecialchars($cell) . '</th>';
		}
	}
		echo "</tr>\n";

	/* After the headers are printed, the remaining elements in $issues are printed 
	 * in the reverse order they are stored in so that the most recent issues
	 * are at the top of the table.
	 */
	for($i = $count-1; $i>0; $i--){
		echo "<tr>";
		foreach ($issues[$i] as $cell){
			if($cell != "\n"){
				if( $cell === "OPEN"){
					echo '<td style="background-color:#FF0000">' . htmlspecialchars($cell) . '</td>';
				}elseif( $cell === "CLOSED"){
					echo '<td style="background-color:#00FF00">' . htmlspecialchars($cell) . '</td>';
				}else{
					echo '<td>' . htmlspecialchars($cell) . '</td>';
				}
			}
		}
		echo "</tr>\n";
	}

	fclose($f);
	echo "</table>";
}
?>
