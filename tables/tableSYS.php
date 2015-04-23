<?php
$path="/fmw/admin/apache/webdev_wt_apch1/abcdocs/webdev/dev/resources/";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
include_once "Table.php";

?>

<html>
<style>
<?php
   setTableStyle();
?>
</style>
<title>SYS Issues</title>

<body>
<h1>SYS Issues</h1>

<?php
	printTable("/dataSYS.csv");
?>
</body>
</html>

