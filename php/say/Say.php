<?php declare(strict_types=1);

const NUMS = [
    0 => "",
    1 => "one",
    2 => "two",
    3 => "three",
    4 => "four",
    5 => "five",
    6 => "six",
    7 => "seven",
    8 => "eight",
    9 => "nine"
];
    
const TENS = [
    10 => "ten",
    11 => "eleven",
    12 => "twelve",
    13 => "thirteen",
    14 => "fourteen",
    15 => "fifteen",
    16 => "sixteen",
    17 => "seventeen",
    18 => "eighteen",
    19 => "nineteen",
    20 => "twenty",
    30 => "thirty",
    40 => "forty",
    50 => "fifty",
    60 => "sixty",
    70 => "seventy",
    80 => "eighty",
    90 => "ninety",
    100 => "hundred"
];

function say(int $number): string {
    if($number < 0 || $number > 999_999_999_999) throw new InvalidArgumentException("Input out of range");
    if($number === 0) return "zero";

    $triplets = str_split(strrev("". $number), 3);
    
    foreach($triplets as $index => $revNum){
        $result = "";
        $num = intval(strrev($revNum));

        if($num === 0){
            $triplets[$index] = $result;
            continue;
        }

        $hundreds = intval($num / 100);
        if($hundreds !== 0) $result = NUMS[$hundreds] . " hundred " . $result;
        
        $tenz = floor($num / 10) % 10; //dunno var name :/
        if($tenz === 1){
            $tenz = ($tenz * 10) + intval($revNum[0]);
            $result .= TENS[$tenz];
        } else if($tenz > 0){
            $result .= TENS[$tenz * 10];
        }
        
        if(intval($revNum[0]) > 0 && ($tenz > 19 || $tenz < 10))
            $result .= $tenz > 0 ? "-" . NUMS[intval($revNum[0])] : NUMS[intval($revNum[0])];

        $result .= match ($index) {
            1 => " thousand",
            2 => " million",
            3 => " billion",
            default => "",
        };
        
        $triplets[$index] = $result;
    }
    return rtrim(implode(" ", array_reverse($triplets)));
}