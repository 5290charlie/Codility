<?php
/**
 * Results: https://codility.com/demo/results/demo4AE4VP-ATQ/
 * Example: ([3,1,2,4,3]) => 1
 */

/**
 * @param array $A
 * @return int
 */
function solution($A) {
    $left = $A[0];
    $right = array_sum($A) - $A[0];

    $min = abs($left - $right);

    for ($i=1; $i<count($A)-1; $i++) {
        $left += $A[$i];
        $right -= $A[$i];

        if (abs($left - $right) < $min) {
            $min = abs($left - $right);
        }
    }

    return $min;
}