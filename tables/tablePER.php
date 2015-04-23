<?php

$path="/fmw/admin/apache/webdev_wt_apch1/abcdocs/webdev/dev/resources/";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
include_once "Table.php";
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/dev/resources/CSS/styleTable.css">
		<title>PER Issues</title>
	</head>
	<body>
	<h1>PER Issues</h1>

	<?php
		printTable("/dataPER.csv");
	?>

	</body>
</html>
