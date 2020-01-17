<?php
// Обычный массив
for($i = 0; $i < $_GET['test']; $i++) {
    $array[$i] = true;
}


// Объект исследованиея
$object = $_GET['type'] === "foreach"?:'spl';

// Операция
$operation = $_GET['operation']?:'bruteforce';

// Выбор операции

    if ($_GET['type'] === "foreach") {
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
        // SPL
        $iter = new ArrayIterator($array);
        $interation = 0;
        $ta = microtime(true);
        /*while ($iter->valid()) {
            $interation++;
            $iter->next();
        }*/
        for($iter->rewind(); $iter->valid(); $iter->next()){
            $interation++;
        }
        $te = microtime(true);
        $ar['Time'] = ($te - $ta);
        $ar['Type'] = "SPL";
    }



$ar['Time'] = round($ar['Time'], 10);
$ar['memory'] = memory_get_usage() / 100000;

echo json_encode($ar);