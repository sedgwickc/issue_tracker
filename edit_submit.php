<?php

$path=__DIR__ . "/resources/";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
include_once "config.php";
include_once "Issue.class.php";
include_once "Edit.php";

$issue=Issue::fromFile(__DIR__ . "/resources/issue.dat");

$issue->procForm();
$issue->writeFields();
header("Location:success.html");
?>
