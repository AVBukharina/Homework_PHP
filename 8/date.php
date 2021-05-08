<?php

if($_GET['date']>=1 and $_GET['date']<=12) $month = $_GET['date'];
else $month = date('m');
    
		$year = date('Y');
		$months = array(
			1  => 'Январь',
			2  => 'Февраль',
			3  => 'Март',
			4  => 'Апрель',
			5  => 'Май',
			6  => 'Июнь',
			7  => 'Июль',
			8  => 'Август',
			9  => 'Сентябрь',
			10 => 'Октябрь',
			11 => 'Ноябрь',
			12 => 'Декабрь'
		);
 
 
 
		$month = intval($month); 
		
		
		$out = '
		<div class="calendar-item">
			<div class="calendar-head">' . $months[$month] . ' ' . $year . '</div> 
			<table>
				<tr>
					<th>Пн</th>
					<th>Вт</th>
					<th>Ср</th>
					<th>Чт</th>
					<th>Пт</th>
					<th>Сб</th>
					<th>Вс</th>
				</tr>';
		$day_week = date('N', mktime(0, 0, 0, $month, 1, $year)); 
		$day_week--; 
 
 
		$out.= '<tr>';
 
		for ($x = 0; $x < $day_week; $x++) {
			$out.= '<td></td>';
		}
 
		$days_counter = 0; 
		$days_month = date('t', mktime(0, 0, 0, $month, 1, $year)); 
	
	
	
		for ($day = 1; $day <= $days_month; $day++) {
				$out.= '<td>'; 
				 
				$time = new DateTime("$day-$month-$year");
				$d = $time->format('N');
				
				
				if($d == 6 or $d == 7) $out.= '<span style="color:red">';
				
					if (date('j.n.Y') == $day . '.' . $month . '.' . $year) $out.= '<b>'.$day.'</b>';
					else $out.= $day;
					
				if($d == 6 or $d == 7) $out.= '<span/>';

				
				$out.= '</td>'; 
				
				
				if ($day_week == 6) {
					$out.= '</tr>';
					if (($days_counter + 1) != $days_month) {
						$out.= '<tr>';
					}
					$day_week = -1;
				} 
				$day_week++; 
				$days_counter++;
		}
 
		$out .= '</tr></table></div>';
		echo $out;
