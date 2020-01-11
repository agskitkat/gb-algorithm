<?php

$array = [];
// Cake array
for($i = 0; $i < $_GET['test']; $i++) {
    $array[$i] = true;
}

// Объект исследованиея
$object = $_GET['type'] === "foreach"?:'spl';

// Операция
$operation = $_GET['operation']?:'bruteforce';

// Выбор операции
if($operation === "bruteforce" ) { // Перебор массива
    if ($object === "foreach") {
        // Обычное foreach
        $interation = 0;
        $ta = microtime(true);
        foreach ($array as $item) {
            $interation++;
        }
        $te = microtime(true);

        $ar['Time'] = $te - $ta;
        $ar['Type'] = "FOREACH";
    } else {
        // Обычное SPL
        $interation = 0;
        $obj = new ArrayObject($array);
        $iter = $obj->getIterator();
        $ta2 = microtime(true);
        while ($iter->valid()) {
            $interation++;
            $iter->next();
        }
        $te2 = microtime(true);
        $ar['Time'] = ($te2 - $ta2);
        $ar['Type'] = "SPL";
    }


} elseif ($operation === "find" ) { // Доступ к элементам

} elseif ($operation === "add" ) {  // Добавление элементов

} elseif ($operation === "remove" ) { // Удаление элементов

}


$ar['Time'] = round($ar['Time'], 10);
$ar['memory'] = memory_get_usage() / 100000;
echo json_encode($ar);