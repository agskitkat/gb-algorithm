<?php

/*
 * 2. Реализовать решение задачи #3 из практического
 *  задания №2 (пропущенное число в цепочке), упростив
 * сложность до O(logn) при помощи парадигмы "Разделяй и властвуй"
 * (бинарный поиск)
 */

$array = [];
$max = 2**10; // Количество элементов массива
$remove = rand(1, $max);
for($i = 0; $i < $max; $i++) {
    if($i != $remove) {
        $array[] = $i;
    }
}
echo "Пропущеное число = " .  $remove . PHP_EOL;



// Метод побыстрее метод - O(log n)
$start = microtime(true);
/**
 * Обычный бинврный поиск, из предыдущего урока
 * Завязан на ключе массива. Ключ равен значению
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
    if($middle == $array[$middle]) { // Завязан на соответствии ключа массива
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
