<!DOCTYPE html>

<!-- 
template.php
Charles Sedgwick
Web Admin, Summer Student 
Email: csedgwic@ab.bluecross.ca

A template to be used to add new pages to the Issue Tracker web application. 
-->

<html>

<?php
	$path=__DIR__ . "/resources/";
	set_include_path(get_include_path() . PATH_SEPARATOR . $path); 
  	
?>


<head>
	<link rel="stylesheet" type="text/css" href="/dev/resources/CSS/styleGen.css">
	<title>Submit an Issue</title>
</head>

<body>

	<div id="container"> 
		<div id="header">
			<p class="centered">Title</p>
		</div>

		<div id="menuCol">
			<p> menu </p>

		</div>

		<div id="content">
         <p class="centered">Content</p>

			<div id=status>
         <p class="centered">Content continued</p>
			</div>
		</div>
		
		<div id="rightCol">
         <p class="centered">right coloumn</p>
		</div>

		<div id="footer">
			<p>Alberta Bluecross 2014</p>
		</div>

	</div>	
	
</body>
</html>
