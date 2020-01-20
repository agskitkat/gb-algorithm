<?php

/*
 * 3. Простые делители числа 13195 - это 5, 7, 13 и 29.
 * Каков самый большой делитель числа 600851475143, являющийся простым числом?
 */

function findSimpleDividers($int) {
    $arResult = [];
    $divider = 2;
    $prime_divider = 0;

    while($int > 1) {   // O(n)
        if(($int % $divider) === 0) {
            $arResult[$int] = $divider;
            $int = $int / $divider;
            if(gmp_prob_prime($divider) && $prime_divider < $divider) {
                $prime_divider = $divider;
            }
            $divider = 2;
        } else {
            $divider++;
        }
    }

    return $prime_divider;
}

echo findSimpleDividers(600851475143 ); // 6857