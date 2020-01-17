<?

/*
1. Определить сложность следующих алгоритмов:
- Поиск элемента массива с известным индексом
- Дублирование одномерного массива через foreach
- Рекурсивная функция нахождения факториала числа
*/

// - Поиск элемента массива с известным индексом
$ar = [1,2,3,4,5,6,7,8,9,10];
$ar[0]; // O(1)
// Сложность O(1)


// Дублирование одномерного массива через foreach
$copy_ar = [];
foreach($ar as $key => $ar_item) {  // O(n)
	$copy_ar[$key] = $ar_item; // O(1)
}
// Сложность O(n)


// Рекурсивная функция нахождения факториала числа
function factorial($n, $factorial = 1) {
	if($n === 1) {
		return $factorial;	// O(1)
	}
	$factorial = $factorial * $n;	// O(1)
	return factorial(--$n, $factorial); // O(n)
}

function factorial2($n) {
	// Короткая запись
	return$n===1?$n:$n*factorial2($n-1); // O(n)
}

echo factorial(4) . PHP_EOL;
echo factorial2(4) . PHP_EOL;
// Сложность O(n)