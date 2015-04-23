<?php
$path="/fmw/admin/apache/webdev_wt_apch1/abcdocs/webdev/resources/";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
include_once "Table.php";
?>

<html>
<style>
<?php
   setTableStyle();
?>
</style>
<title>UAT Issues</title>
<body>
<h1>UAT Issues</h1>

<?php
	printTable("/dataUAT.csv");
?>
</body>
</html>

