<?php

/*
 * 2. Реализовать решение задачи #3 из практического
 *  задания №2 (пропущенное число в цепочке), упростив
 * сложность до O(logn) при помощи парадигмы "Разделяй и властвуй"
 * (бинарный поиск)
 */

// Метод побыстрее метод - O(log n)
$start = microtime(true);
/**
 * Обычный бинврный поиск
 *
 * @param $array
 * @param $min
 * @param $max
 * @return integer
 */
function findLostNumberBinary(&$array, $min, $max) {
    $middle = round($max - ($max - $min) / 2);
    if(($max - $min) == 1) {
        return $max;
    }
    if($middle == $array[$middle]) {
        return findLostNumberBinary($array, $middle, $max);
    } else {
        return findLostNumberBinary($array, $min, $middle);
    }
}

$result = findLostNumberBinary($array, 0, count($array));
if($result == $remove) {
    echo "Число " . ($last + 1) . " функцией findLostNumberBinary() найдено за " . strval(microtime(true) - $start) . PHP_EOL;
} else {
    echo "Функция findLostNumberBinary() не дала верный результат: " . $result;
}