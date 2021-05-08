<?php
	$rules = parse_ini_file("index.ini",1);
	
	 
 
	$file = $rules['main']['filename']; 
	$f = fopen($file, "r"); 
	  

	
	 
	fseek($f, $rules['first_rule']['symbol']); 
	if($rules['first_rule']['upper'] == 'true'){ 
		echo strtoupper(fread($f, 10)); 
	} else {
		echo strtolower(fread($f, 10));
	}
	

	fseek($f, $rules['second_rule']['symbol']); 
	
	for ($i = 1; $i < 10; $i++) {
		if($rules['second_rule']['direction'] == "+"){ 
			$simvol = fread($f, 1);
			fseek($f, -1, SEEK_CUR); 
			if($simvol == 9){
				echo fread($f, 1)-8;
			} else { 
				echo fread($f, 1)+1;
			}
		}
	}


fseek($f, $rules['third_rule']['symbol']); 

for ($i = 1; $i < 10; $i++) {

    $simvol = fread($f, 1);
    fseek($f, -1, SEEK_CUR);

    if($simvol == $rules['third_rule']['delete']){  
        fseek($f, 1, SEEK_CUR);
    }


}


	echo fread($f,100);
	
	
  
  
 
	$rules['third_rule']['delete'];
	 
	 
	  
	fclose ($f);
	 
print_r($rules);
	echo '<pre>';
	echo '</pre>'; 
?>