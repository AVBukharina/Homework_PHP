<?php 
 

$text = $_POST['text']; 
$lines = explode("\n", $text);  



 


function sortText($a){
	$text = $_POST['text']; 
	$slova = explode(" ", $text); 
	$vtoroeSlovo = trim($slova[1]);  
	if ($a[0]==$vtoroeSlovo[0]) return 0;
	return ($a[0]<$vtoroeSlovo[0])?-1:1; 
}

uasort($lines, "sortText"); 
 
echo '-------------------------   текст с сортировкой строк по 2 слову -------------------------<br/>';

foreach($lines as $line){ 
	echo $line.'<br/>';  
}






echo '-------------------------   случайная сортировка слов в строках -------------------------<br/>'; 


$AllTextArray = [];
foreach($lines as $words){
	$AllTextArray[] = explode(" ", trim($words)) ;  
}


foreach($AllTextArray as $line){
	shuffle($line);
	foreach($line as $word){ echo $word.' '; }
	echo '<br/>'; 
} 

