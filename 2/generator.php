<?php 

$str = $_POST['str'];


function ObrabotkaStroki($str) {
	$char_array = preg_split('//', $str);  
	$i = 0;  
	$count_replace = 0;
	$array = [];
	for ($i=0; $i<count($char_array); $i++){ 
	
	
	 
		switch ($char_array[$i]) {  
		case 'h':
			$char_array[$i] = '4';
			$count_replace ++;
			break;
		case 'l':
			$char_array[$i] = '1';
			$count_replace ++;
			break;
		case 'e':
			$char_array[$i] = '3';
			$count_replace ++;
			break;
		case 'o':
			$char_array[$i] = '0';
			$count_replace ++;
			break;
		default:
			$char_array[$i];
		}
	
	$array['sim'] = $char_array[$i];
	$array['count_replace'] = $count_replace;
	
	yield $array;
	}
} 

$count_count_replace = 0;
foreach (ObrabotkaStroki($str) as $row){
	echo $row['sim'];
	$count_count_replace = $row['count_replace'];
}

echo '<br/> Кол-во замен: '.$count_count_replace;
 
   
  
















