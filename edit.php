<!DOCTYPE html>

<!-- 
edit.php
Charles Sedgwick
Web Admin, Summer Student 
Email: csedgwic@ab.bluecross.ca

Submit.php allows the user to add an issue to an ASR environment issue tracker. 
The trackers use csv files to store data. The heavy lifting is done in php, 
specifically with the code found in Issue.class.php. Submit.php generates 
the page the user sees using the methods within an Issue object. 
-->
<?php
   $path=__DIR__ . "/resources/";
   set_include_path(get_include_path() . PATH_SEPARATOR . $path);
   include_once "config.php";
   include_once "Issue.class.php";
   include_once "Edit.php";
  	$issue=Issue::fromFile(__DIR__ . "/resources/issue.dat");
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="resources/CSS/styleGen.css">	

	<title>Edit an Issue</title>
</head>

<body>

	<div id="container">

		<div id="header">
			<h1> Edit an Issue </h1>
		</div>

		<div id="menuCol">
			<form method="link" action="edit.php">
				<input type="submit" value="Edit Existing Issue">
			</form>

			<div name="links">
				<br>
				<a href="/tables/tableSYS.php">SYS/AT Table</a>&nbsp;
				<a href="/dev/tables/tablePER.php">PER Table</a><br>
				<a href="/tables/tableQAT.php">QAT Table</a>&nbsp;
				<a href="/tables/tableUAT.php">UAT/BPV Table</a><br>
				<a href="/tables/tablePRD.php">PRD Table</a>&nbsp;
				<a href="/tables/tableXAP.php">XAP Table</a><br>
				<a href="/tables/tableDEV.php">DEV Table</a>&nbsp;
				<a href="/tables/tableTRN.php">TRN Table</a><br>
				<a href="/tables/tableBIR.php">BIR Table</a>&nbsp;
				<a href="/tables/tableIRH.php">IRH Table</a><br>
				<a href="/tables/tableBPV.php">BPV Table</a>&nbsp;
				<a href="/tables/tablePRL.php">PRL Table</a><br>
			</div>
		</div>

		<div id="content">
			<div id="changes">

				<form id="changes" action="edit2.php" method="post">
					<h2>Only change fields you want to edit: </h2>
					<?php echo "<h3>Editing issue " . $issue->getIssNum() . " in " . $issue->getEnviron() . ".</h3><br>"; ?>

					<table>
						<tr>
							<th>Lead Investigator:</th>
							<th>Description:</th>
							<th>Source Apps:</th>
							<th>Affected Apps:</th>
							<th>ALM Defect ID</th>
							<th>Status</th>
						</tr>
						<tr>
							<td><input type="text" name="invest" maxLength="25" value="<?=$issue->getInvest();?>"></td>
							<td><div id="prevDesc"><?php echo $issue->getDesc()?></div><textarea name="desc" rows="4" cols="50"></textarea></td>
							<td id="checkbox">
								<input type="checkbox" name="source_BEN1" value="BEN1"<?php if(strpos($issue->getAppsSource(),"BEN1")!==false){echo 'checked="checked"';}?> >BEN1<br>
								<input type="checkbox" name="source_BEN2" value="BEN2" <?php if(strpos($issue->getAppsSource(),"BEN2")!==false){echo 'checked="checked"';}?>>BEN2<br>
								<input type="checkbox" name="source_BRR" value="BRR"<?php if(strpos($issue->getAppsSource(),"BRR")!==false){echo 'checked="checked"';}?>>BRR<br>
								<input type="checkbox" name="source_CNV2" value="CNV2"<?php if(strpos($issue->getAppsSource(),"CNV2")!==false){echo 'checked="checked"';}?>>CNV2<br>
								<input type="checkbox" name="source_ENR1" value="ENR1"<?php if(strpos($issue->getAppsSource(),"ENR1")!==false){echo 'checked="checked"';}?>>ENR1<br>
								<input type="checkbox" name="source_ESR1" value="ESR1"<?php if(strpos($issue->getAppsSource(),"ESR1")!==false){echo 'checked="checked"';}?>>ESR1<br>
								<input type="checkbox" name="source_OEA1" value="OEA1"<?php if(strpos($issue->getAppsSource(),'OEA1')!==false){echo 'checked="checked"';}?>>OEA1<br>
								<input type="checkbox" name="source_OEA2" value="OEA2"<?php if(strpos($issue->getAppsSource(),"OEA2")!==false){echo 'checked="checked"';}?>>OEA2<br>
								<input type="checkbox" name="source_SAL1" value="SAL1"<?php if(strpos($issue->getAppsSource(),"SAL1")!==false){echo 'checked="checked"';}?>>SAL1<br>
								<input type="checkbox" name="source_FIN1" value="FIN1"<?php if(strpos($issue->getAppsSource(),"FIN1")!==false){echo 'checked="checked"';}?>>FIN1<br>
								<input type="checkbox" name="source_IGR1" value="IGR1"<?php if(strpos($issue->getAppsSource(),"IGR1")!==false){echo 'checked="checked"';}?>>IGR1<br>
								<input type="checkbox" name="source_PTY" value="PTY"<?php if(strpos($issue->getAppsSource(),"PTY")!==false){echo 'checked="checked"';}?>>PTY<br>
								<input type="checkbox" name="source_PYR" value="PYR"<?php if(strpos($issue->getAppsSource(),"PYR")!==false){echo 'checked="checked"';}?>>PYR<br>
								<input type="checkbox" name="source_SEC" value="SEC"<?php if(strpos($issue->getAppsSource(),"SEC")!==false){echo 'checked="checked"';}?>>SEC<br>
								<input type="checkbox" name="source_PII" value="PII"<?php if(strpos($issue->getAppsSource(),"PII")!==false){echo 'checked="checked"';}?>>PII<br>
								<input type="checkbox" name="source_IAMAPP" value="IAMAPP"<?php if(strpos($issue->getAppsSource(),"IAMAPP")!==false){echo 'checked="checked"';}?>>IAMAPP<br>
								<input type="checkbox" name="source_ALL" value="ALL"<?php if(strpos($issue->getAppsSource(),"Environment Wide")!==false){echo 'checked="checked"';}?>>Evironment Wide<br>
							</td>
							<td id="checkbox">
								<input type="checkbox" name="BEN1" value="BEN1"<?php if(strpos($issue->getAppsAffect(),"BEN1")!==false){echo 'checked="checked"';}?>>BEN1<br>
								<input type="checkbox" name="BEN2" value="BEN2"<?php if(strpos($issue->getAppsAffect(),"BEN2")!==false){echo 'checked="checked"';}?>>BEN2<br>
								<input type="checkbox" name="BRR" value="BRR"<?php if(strpos($issue->getAppsAffect(),"BRR")!==false){echo 'checked="checked"';}?>>BRR<br>
								<input type="checkbox" name="CNV2" value="CNV2"<?php if(strpos($issue->getAppsAffect(),"CNV2")!==false){echo 'checked="checked"';}?>>CNV2<br>
								<input type="checkbox" name="ENR1" value="ENR1<?php if(strpos($issue->getAppsAffect(),"ENR1")!==false){echo 'checked="checked"';}?>">ENR1<br>
								<input type="checkbox" name="ESR1" value="ESR1"<?php if(strpos($issue->getAppsAffect(),"ESR1")!==false){echo 'checked="checked"';}?>>ESR1<br>
								<input type="checkbox" name="OEA1" value="OEA1"<?php if(strpos($issue->getAppsAffect(),"OEA1")!==false){echo 'checked="checked"';}?>>OEA1<br>
								<input type="checkbox" name="OEA2" value="OEA2"<?php if(strpos($issue->getAppsAffect(),"OEA2")!==false){echo 'checked="checked"';}?>>OEA2<br>
								<input type="checkbox" name="SAL1" value="SAL1"<?php if(strpos($issue->getAppsAffect(),"SAL1")!==false){echo 'checked="checked"';}?>>SAL1<br>
								<input type="checkbox" name="FIN1" value="FIN1"<?php if(strpos($issue->getAppsAffect(),"FIN1")!==false){echo 'checked="checked"';}?>>FIN1<br>
								<input type="checkbox" name="IGR1" value="IGR1"<?php if(strpos($issue->getAppsAffect(),"IGR1")!==false){echo 'checked="checked"';}?>>IGR1<br>
								<input type="checkbox" name="PTY" value="PTY"<?php if(strpos($issue->getAppsAffect(),"PTY")!==false){echo 'checked="checked"';}?>>PTY<br>
								<input type="checkbox" name="PYR" value="PYR"<?php if(strpos($issue->getAppsAffect(),"PYR")!==false){echo 'checked="checked"';}?>>PYR<br>
								<input type="checkbox" name="SEC" value="SEC"<?php if(strpos($issue->getAppsAffect(),"SEC")!==false){echo 'checked="checked"';}?>>SEC<br>
								<input type="checkbox" name="PII" value="PII"<?php if(strpos($issue->getAppsAffect(),"PII")!==false){echo 'checked="checked"';}?>>PII<br>
								<input type="checkbox" name="IAMAPP" value="IAMAPP"<?php if(strpos($issue->getAppsAffect(),"IAMAPP")!==false){echo 'checked="checked"';}?>>IAMAPP<br>
								<input type="checkbox" name="ALL" value="ALL"<?php if(strpos($issue->getAppsAffect(),"Environment Wide")!==false){echo 'checked="checked"';}?>>Evironment Wide
							</td>

							<td><input type="text" name="defectID" maxLEngth="10" value="<?=$issue->getDefectID()?>"></td>
							<td><select name="stat">
									<option value="SELECT"<?php if($issue->getStatus() ==='SELECT'){echo 'selected="selected"';}?>>SELECT</option>
									<option <?php if($issue->getStatus()==='OPEN'){echo 'selected="selected"';}?>value="OPEN">OPEN</option>
									<option <?php if($issue->getStatus()==='CLOSED'){echo 'selected="selected"';}?>value="CLOSED">CLOSED</option>
								</select>
							</td>
						</tr>
				</table>

				<input type="submit" name="formSub" value="Submit"><br>

			</form>

		</div>
	</div>

	<div id="rightCol">

	</div>


	<div id="footer">
		Alberta Bluecross 2014.		
	</div>

	</div>

</body>
</html>
