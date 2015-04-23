<?php
   $path=__DIR__ . "/resources/";
   set_include_path(get_include_path() . PATH_SEPARATOR . $path);
   include_once "Issue.class.php";
   include_once "config.php";

   $issue = new Issue();
   $issue->procForm();
	$issue->writeFields();
	header('Location: success.html');
?>
