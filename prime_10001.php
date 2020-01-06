<?php
$i = 0;
$num = 0;

while($i != 10001) {
    if( gmp_prob_prime(++$num) ) {
        $i++;
    }
}

echo "10001 простое число = " . $num;