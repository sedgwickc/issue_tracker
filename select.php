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
   include_once "config.php";
   include_once "Issue.class.php";
   include_once "Edit.php";

   if(isset($_POST['envIss'])){
      $issue = new Issue();
      $issue->setEnv($_POST['env']);
      $issue->setIssNum($_POST['issNum']);
      $issNum = $issue->getIssNum();
      if($issue->getEnviron() !== 'SELECT'){

         $issues = array();
         $numIssues = 0;
         getIssues($issue->getDataFile($issue->getEnviron()), $issues, $numIssues);
			$issue->setFields($issues[$issNum]->getFields());

         if(!($issNum <= $numIssues) || !($issNum > 0)){
            echo "ERROR: Invalid Issue#! Try again.<br>";
            exit;
         }

      }else{
         echo "ERROR: Must select an environment!";
         exit;
      }

      $issue->saveIssue();

      header("Location:edit.php");
   }

	
?>


<head>
	<link rel="stylesheet" type="text/css" href="/dev/resources/CSS/styleGen.css">
	<title>Select an Issue</title>
</head>

<body>

	<div id="container"> 
		<div id="header">
			<p class="centered">Select an Issue</p>
		</div>

		<div id="menuCol">
			<p> menu </p>

		</div>

		<div id="content">
         <h2> Select an Environment Issue to Edit: </h2>

         <div id="selectForm">
            <form id="envIss" action="select.php" method="post">
               Environment:
               <select name="env">
                  <option value="SELECT">SELECT</option>
                  <option value="PER">PER</option>
                  <option value="SYS">SYS/AT</option>
                  <option value="QAT">QAT</option>
                  <option value="PRD">PRD</option>
                  <option value="DEV">DEV</option>
                  <option value="IRH">IRH</option>
                  <option value="BIR">BIR</option>
                  <option value="XAP">XAP</option>
                  <option value="TRN">TRN</option>
                  <option value="BPV">BPV</option>
                  <option value="PRL">PRL</option>
                  <option value="UAT">UAT/BPV</option>
               </select><br><br>

               Issue Number:
               <input type="text" name="issNum" ><br>
               <input type="submit" name="envIss" value="Load">
            </form>


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
