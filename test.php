<?php

$array = [];
// Cake array
for($i = 0; $i < $_GET['test']; $i++) {
    $array[$i] = true;
}


if($_GET['type'] === "foreach") {
    $interation = 0;

    $ta = microtime(true);
    foreach ($array as $item) {
        $interation++;
    }
    $te = microtime(true);

    $ar['Time'] = $te - $ta;
    $ar['Type'] = "FOREACH";

} else {
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
$ar['Time'] =  round($ar['Time'], 10);
echo json_encode($ar);