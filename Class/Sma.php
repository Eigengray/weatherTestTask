<?php


class Sma
{
    private $sma;

    function getSma(array $data, $range): array
    {
        $sum = array_sum(array_slice($data, 0, $range));
        $result = array($range - 1 => round($sum / $range, 2));
        for ($i = $range, $n = count($data); $i != $n; ++$i) {
            $result[$i] = round($result[$i - 1] + ($data[$i] - $data[$i - $range]) / $range, 2);
        }
        return array_values($result);
    }

}