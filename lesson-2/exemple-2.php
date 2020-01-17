<?

/*
2.Определить сложность следующих алгоритмов. 
Сколько произойдет итераций?
*/

// 1)
$t = 0; // Счётчик интераций
$n = 100;
$array[] = [];
for ($i = 0; $i < $n; $i++) {  			// O(n)
	for ($j = 1; $j < $n; $j *= 2) {    // O(log n)
		$t++;
		$array[$i][$j] = true; 			// O(1)
	} 
}
echo $t . PHP_EOL; // Количество интераций 700
// Сложность O(n * (log n) )



// 2)
$t = 0; // Счётчик интераций
$n = 100;
$array[] = [];
for ($i = 0; $i < $n; $i += 2) { 	// O(n/2)
	// Интераций n/2, при $n = 100, 100/2 = 50 интераций 
	for ($j = $i; $j < $n; $j++) { 	// O(n)
		$array[$i][$j]= true; 		// O(1)
		$t++;
	}
}
echo $t . PHP_EOL; // Количество интераций 2550
// Сложность O((n/2) * n) 
// или O((n * 0.5) * n) 
// или O(n^2/2)