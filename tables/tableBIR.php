<?php

$path="/fmw/admin/apache/webdev_wt_apch1/abcdocs/webdev/dev/resources/";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
include_once "Table.php";

?>

<html>
<title>BIR Issues</title>
<style>
<?php
	setTableStyle();
?>
</style>
<body>
<h1>BIR Issues</h1>

<?php
	printTable("/dataBIR.csv");
?>

</body>
</html>

