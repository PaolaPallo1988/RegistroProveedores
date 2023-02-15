
<?php

$todaysDate = date("2020");
$dateString = "2021";




// https://www.delftstack.com/es/howto/php/compare-dates-php/
$actual = date("Y");
$fecha = "2022 ";
$antes = ("2021");

if (($fecha < $actual)&& ($fecha > $antes)) {
    echo "ESTA CORRECTA";
} else {
    echo "NO ES CORRECTO";
}


//https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/Date/getFullYear
//Compruebe si hay una fecha pasada.

function checkThePast($time) {
    $convertToUNIXtime = strtotime($time);

    return $convertToUNIXtime < time();
}

if (checkThePast('202-12-13 22:00:00')) {
    echo "The date is in the past";
} else {
    echo "No, it's not in the past";
}


//https://code.tutsplus.com/es/tutorials/how-to-compare-dates-in-php--cms-37161

$last = new DateTime("25 Dec 2020");
$now = new DateTime("now");
$next = new DateTime("25 Dec 2021");
$days_last = $last->diff($now);
$days_next = $now->diff($next);
//echo $days_last->format('%a days').' since last Christmas.';
// Output: 170 days since last Christmas. 
//echo $days_next->format('%a days').' to next Christmas.';
// Output: 194 days to next Christmas.

?>