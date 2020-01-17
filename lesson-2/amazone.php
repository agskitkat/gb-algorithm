<?php
// Генерируем массив с одним пропущеным числом
// 1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12
echo str_repeat("=", 30) . PHP_EOL; // разделитьль :)
$array = [];
$max = 2**24; // Количество элементов массива
$remove = rand(1, $max);
for($i = 0; $i < $max; $i++) {
    if($i != $remove) {
        $array[] = $i;
    }
}
//print_r($array);

echo "Пропущеное число = " .  $remove . PHP_EOL;
echo "Максимальное число = " . $array[count($array)-1] . PHP_EOL;


// Медленный метод - O(n)
$start = microtime(true);
$last = 0;
foreach($array as $item) {
    if($res = ($item - $last) > 1 ) {
        break;
    }
    $last = $item;
}
echo "Число " . ($last + 1) . " перебором найдено за " . round((microtime(true) - $start), 10) . PHP_EOL;


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

echo PHP_EOL . str_repeat("=", 30) . PHP_EOL; // разделитьль :)