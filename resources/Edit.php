<?php

$path=__DIR__ . "/resources/";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

include_once "config.php";

function getIssues($dataFile,&$issues, &$numIssues){
   if( ($fs = fopen(__DIR__ . "/" . $dataFile,"r")) !== false){
      while(!feof($fs)){
         if(($fields = fgetcsv($fs, ',')) !== false){
            $issue = Issue::withData($fields,strstr($dataFile,3),$numIssues);
            $issues[] = $issue;
            $numIssues++;
         }
      }
      $numIssues = $numIssues - 1;


      if(empty($issues)){
         echo "getIssues(): [ERROR] No usable data in " . __DIR__ . $dataFile;
         exit;
      }
      fclose($fs);
   }else{
      echo "getIssues(): [ERROR] Unable to open environment data.";
      exit;
   }

}

function writeIssues($issues){

	if(empty($issues)){
		echo "writeIssues(): [ERROR] No issues to write to file.";
		exit;
	}
	
	$count = count($issues);
	for($i=0; $i < $count; $i++){		
		$issues[$i]->writeFields();
	} 
}

function sanitize(&$str,$desc=true){
	
	$str = str_replace(",", "", $str);
	$str = str_replace("\n", " ", $str);

	//Do not convert the description to upper case
	if($desc !== true){
		$str = strtoupper($str);
	}
}

?>
