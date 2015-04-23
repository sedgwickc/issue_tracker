<?php
$path="/fmw/admin/apache/webdev_wt_apch1/abcdocs/webdev/resources/";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
include_once "Table.php";
?>

<html>
<title>PRD Issues</title>
<style>
<?php
	setTableStyle();
?>
</style>
<body>
<h1>PRD Issues</h1>

<?php
	printTable("/dataPRD.csv");
?>

</body>
</html>

