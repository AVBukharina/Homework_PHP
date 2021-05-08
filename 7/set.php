<style>
	html {
		background-color: #000;
		color: #f7f7f7;
	}
</style>	
<?php  


$host = escapeshellcmd($_POST['host']);

$ip = gethostbyname($host);  


if(preg_match("/\d+.\d+.\d+.\d+/", $ip)){
    echo '<b>'.$ip.'</b><br /><br />';
    if($_POST['util'] == 'ping'){
        exec("ping ".$ip, $output);
        $var = $output[7];
        $var = preg_replace('/%.*$/', '', $var);
        $var = preg_replace('/.*.\D/', '', $var);
        echo 100-(int)$var.'% uspeshno vipolnennih zaprosov';
    }
    if($_POST['util'] == 'tracert'){
        exec( 'tracert '.$ip, $output);
        $str = '';
        foreach($output as $ip){
            preg_match_all("/\d+.\d+.\d+.\d+/", $ip, $matches);
            $str .= implode(" ", $matches[0]).' ';
        }
        $str = str_replace($ip, '', $str);
        echo $str;
    }
} else {
    echo 'ne vernyi HOST';
};
