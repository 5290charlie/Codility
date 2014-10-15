<?php
/**
 * Results: https://codility.com/demo/results/demoNCTJQT-FPN/
 * Example: (6,11,2) => 3
 */

/**
 * @param int $A
 * @param int $B
 * @param int $K
 * @return int
 */
function solution($A, $B, $K) {
    if($A % $K == 0)
        $result = floor(($B - $A) / $K) + 1;
    else
        $result = floor($B / $K - (floor($A / $K) + 1)) + 1;

    return (int)$result;
}