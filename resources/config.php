<?php

date_default_timezone_set("America/Edmonton");

$dataFiles = array("SYS"=>"dataSYS.csv",
               "PER"=>"dataPER.csv",
               "QAT"=>"dataQAT.csv",
               "UAT"=>"dataUAT.csv",
               "PRD"=>"dataPRD.csv",
               "XAP"=>"dataXAP.csv",
               "DEV"=>"dataDEV.csv",
               "IRH"=>"dataIRH.csv",
               "BIR"=>"dataBIR.csv",
               "TRN"=>"dataTRN.csv",
               "BPV"=>"dataBPV.csv",
               "PRL"=>"dataPRL.csv",
               "test"=>"dataTest.csv");

$index = array("index"=>0,
					"dateTime"=>0,
					"lead"=>2,
               "desc"=>3,
               "appsAffect"=>5,
               "appsSource"=>4,
               "defectID"=>6,
               "stat"=>7);
?>
