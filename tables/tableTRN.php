<?php
$path="/fmw/admin/apache/webdev_wt_apch1/abcdocs/webdev/resources/";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
include_once "Table.php";
?>

<html>
<title>TRN Issues</title>
<style>
<?php
	setTableStyle();
?>
</style>
<body>
<h1>TRN Issues</h1>

<?php
	printTable("/dataTRN.csv");
?>

</body>
</html>

