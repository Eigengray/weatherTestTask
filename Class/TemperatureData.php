<?php


class TemperatureData
{
    private array $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getDataForYear(): array
    {
        $array = [];
        $averagePerDay = 0;
        $startDay = '01';
        $count = 0;
        foreach (array_reverse($this->data) as $key => $value){
            $day = substr($value['Local time in Moscow'], 0, 2);
            if ( $startDay !== $day ){
                $startDay = $day;
                array_push($array, round(($averagePerDay / $count), 2));
                $averagePerDay = 0;
                $count = 0;
            }
            $averagePerDay += $value['T'];
            $count++;
        }
        return $array;
    }

    /**
     * @return array
     */
    public function getDataForMonths(): array
    {
        $array = [];
        $daysData = [];
        $averagePerDay = 0;
        $startMonth = '01';
        $startDay = '01';
        $count = 0;
        foreach (array_reverse($this->data) as $key => $value){
            $currentMonth = substr($value['Local time in Moscow'], 3, 2);
            $currentDay = substr($value['Local time in Moscow'], 0, 2);
            if ( $startDay !== $currentDay ){
                $startDay = $currentDay;
                array_push($daysData, round(($averagePerDay / $count), 2));
                if ( $startMonth !== $currentMonth or ( $startMonth == '12' and $currentDay =='31' ) ){
                    array_push($array, $daysData);
                    $startMonth = $currentMonth;
                    $daysData = [];
                }
                $averagePerDay = 0;
                $count = 0;
            }
            $averagePerDay += $value['T'];
            $count++;
        }

        return $array;
    }

    /**
     * @return array
     */
    public function getDataForWeeks(): array
    {
        $weekCount = 1;
        $weekArray = [];
        $currentWeek = [];
        $array = $this->getDataForYear();
        for ( $i = 0; $i < count($array); $i++ ){
            array_push($currentWeek, $array[$i]);
            if ( $i == 2 || ($i % 7 - 2 == 0) ){
                array_push($weekArray, $currentWeek);
                $weekCount++;
                $currentWeek = [];
            }
        }
        return $weekArray;
    }
}