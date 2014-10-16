<?php
/**
 * Lesson 3 - CountDiv (medium)
 * Compute number of integers divisible by K in range [A..B].
 *
 * Results: https://codility.com/demo/results/demoNCTJQT-FPN/
 * Example: (6,11,2) => 3
 */

/**
 * @param int $A    Beginning of integer range
 * @param int $B    End of integer range
 * @param int $K    Divisor
 * @return int      Number of integers between [$A..$B] that are divisible by $K
 */
function solution($A, $B, $K) {
    if($A % $K == 0) {
        // If $A is a multiple of $K, just divide the difference ($B-$A) by $K (add one to account for $A being divisible)
        $result = floor(($B - $A) / $K) + 1;
    } else {
        // Otherwise, subtract the amount that would go into $A from the amount that would go into $B
        $result = floor($B / $K - (floor($A / $K) + 1)) + 1;
    }

    return (int)$result;
}