<?php

$ch = curl_init();
curl_setopt(
    $ch,
    CURLOPT_URL,
    "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G08A"
);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$data = curl_exec($ch);
curl_close($ch);

$data_tab = str_split($data, 33); // data by trame to get one trame

$lastIndex = count($data_tab) - 2;
$currentIndex = $lastIndex;
$trame = '';
$retryCounter = 0; // Counter for retrying the loop

while ($currentIndex >= 0 && $retryCounter < 2) {
    $trame = $data_tab[$currentIndex];
    list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf(
        $trame,
        "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s"
    );

    if ($c == '3') {
        $decimalValue = hexdec($v); // Conversion en décimal

        $list = array(
             't' => $t,
             'o' => $o,
             'r' => $r,
             'c' => $c,
             'n' => $n,
             'v' => $v,
             'a' => $a,
             'x' => $x,
             'year' => $year,
             'month' => $month,
             'day' => $day,
             'hour' => $hour,
             'min' => $min,
             'sec' => $sec,
             'decimalValue' => $decimalValue,
         );

         $jsonList = json_encode($list);

         header('Content-Type: application/json');

         echo $jsonList;
         break; // Correct value found, exit the loop
    } else if ($retryCounter < 2) {
        $currentIndex--;
        $retryCounter++;
    } else {
    break; // Stop the loop if maximum retries exceeded
    }
}
?>