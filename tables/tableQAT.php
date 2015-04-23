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
<title>QAT Issues</title>
<body>
<h1>QAT Issues</h1>

<?php
	printTable("/dataQAT.csv");
?>
</body>
</html>

