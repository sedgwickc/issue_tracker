<?php

$path="/fmw/admin/apache/webdev_wt_apch1/abcdocs/webdev/resources/";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
include_once "Table.php";

?>

<html>
<title>IRH Issues</title>
<style>
<?php
	setTableStyle();
?>
</style>
<body>
<h1>IRH Issues</h1>

<?php
	printTable("/dataIRH.csv");
?>

</body>
</html>

