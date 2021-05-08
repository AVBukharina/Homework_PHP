<?php 
$text = $_POST['text'];

$lines = explode("\n", $text); 



$array = [];                                   
foreach($lines as $words){					   
	$array[] = explode(" ", trim($words)) ;   
}



$result = array();
$summVeroytnostei = array(); 


foreach($array as $ar){ 
	$summVeroytnostei[] =  round($ar[1]/strlen($ar[0]), 2); 
	
	$result['summ'] = array_sum($summVeroytnostei)/count($array ); 
	$result['data'][] = [
						'text' => $ar[0],
						'weight' => $ar[1],
						'probability' => round($ar[1]/strlen($ar[0]), 2)
						];
}

$json1 = json_encode($result, JSON_PRETTY_PRINT); 



include "gen.php"; 
  

$result2 = array();  
foreach (ObrabotkaStroki($result['data']) as $row){
	$result2[] = $row;
} 
$json2 =  json_encode($result2, JSON_PRETTY_PRINT);   
 
 
 echo '<pre>'; 
 print_r($json1);
 echo '<br />'; 
 print_r($json2);
 echo '</pre>';
