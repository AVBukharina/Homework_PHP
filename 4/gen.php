<?php

function ObrabotkaStroki($array) { 

    $count_strok = count($array);   
    $count_random = 10000;   
    $newArray = array();


    for($i=0;$i<$count_random;$i++){ 
        $random = rand(0, $count_strok-1);  


        if (array_key_exists($random, $newArray)) {
            $count = $newArray[$random]['count'];
        } else {
            $count = 0;
        }


        $newArray[$random]  =
            [
                'text' => $array[$random]['text'],
                'count' =>  $count + 1,
                'count_strok' => $count_strok
            ];


    }


    foreach($newArray as $str){
        yield [   
            'text' => $str['text'],
            'count' => $str['count'],
            'calculated_probability' => round($str['count']/$count_random*100, 0).'%'
        ];
    }
}