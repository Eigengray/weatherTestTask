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
    $sma->getSma($temperatureData->getDataForYear(),3)
);

function createRowAndModifiedArray($resultRow){
    $resultModified = [];
    $sma = new Sma();
    for ( $i = 0; $i < count($resultRow); $i++){
        array_push($resultModified, $sma->getSma($resultRow[$i],3));
    }
    return array_merge( [
        'row' => $resultRow,
        'modified' => $resultModified
    ]);
}

$resultMonthRow = $temperatureData->getDataForMonths();
$resultMonth = createRowAndModifiedArray($resultMonthRow);

$resultWeekRow = $temperatureData->getDataForWeeks();
$resultWeek = createRowAndModifiedArray($resultWeekRow);

//print("<pre>".print_r($resultWeek, true)."</pre>");
