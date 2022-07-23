<?php
include "Class/TemperatureData.php";
include "Class/Sma.php";

$string = file_get_contents('resources/weather.json');
if ($string === false) {
    echo 'File not found';
    return;
}
$json_a = json_decode($string, true);
if ($json_a === null) {
    echo 'File is empty';
    return;
}
$temperatureData = new TemperatureData($json_a);
$sma = new Sma();

$result = [];
array_push($result,
    $temperatureData->getDataForYear(),
    $sma->getSma($temperatureData->getDataForYear(),5)
);

$resultMonthRow = $temperatureData->getDataForMonths();
$resultMonthModified = [];
$resultMonth = [];
for ( $i = 0; $i < count($resultMonthRow); $i++){
    array_push($resultMonthModified, $sma->getSma($resultMonthRow[$i],5));
}
$resultMonth = array_merge( [
    'row' => $resultMonthRow,
    'modified' => $resultMonthModified
]);


$resultWeekRow = $temperatureData->getDataForWeeks();
$resultWeekModified = [];
$resultWeek = [];
for ( $i = 0; $i < count($resultWeekRow); $i++){
    array_push($resultWeekModified, $sma->getSma($resultWeekRow[$i],3));
}
$resultWeek = array_merge( [
    'row' => $resultWeekRow,
    'modified' => $resultWeekModified
]);

//print("<pre>".print_r($resultWeek, true)."</pre>");
