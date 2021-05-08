<?php


	
	$source = $_POST['code'];
	$source = preg_split('//', $source); 
	
	
	$source = array_filter($source);   
	 
	
 
	
	$source = array_values($source); 
	
	 
	$chain = array(); 
	$cell = 0; 
	$brackets = 0; 
	
	for($i=0; $i<count($source); ++$i) {
		switch($source[$i]) {
			case "+" :
				$chain[$cell]++;
				break;
			case "-" :
		 		$chain[$cell]--;
				break;
			case "." :
				print chr($chain[$cell]);
				break;
			case "," :
				$chain[$cell] = ord(mb_substr($_POST['param'], 0, 1));
				break;
			case ">" :
				$cell++;
				if(!isset($chain[$cell])) {
					$chain[$cell] = 0;
				}
				break;
			case "<" :
				$cell--;
				if(!isset($chain[$cell])) {
					$chain[$cell] = 0;
				}
				break; 
			case "[" :
				if(!$chain[$cell]) {
					$brackets = 1; 
					while($brackets) {
						$i++;
						if($source[$i] == "[") {
							$brackets++;
						} elseif ($source[$i] == "]") {
							$brackets--;
						}
					}
				} 
				break;
				
				
			case "]" :
				if($chain[$cell]) {
					$brackets = 1;
					while($brackets) {
						$i--;
						if($source[$i] == "]") {
							$brackets++;
						} elseif ($source[$i] == "[") {
							$brackets--;
						}
					}
				}
				break;
	 	}
	}


?>