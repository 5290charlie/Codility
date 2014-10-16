<?php
/**
 * Lesson 1 - TapeEquilibrium (easy)
 * Minimize the value |(A[0] + ... + A[P-1]) - (A[P] + ... + A[N-1])|.
 *
 * Results: https://codility.com/demo/results/demo4AE4VP-ATQ/
 * Example: ([3,1,2,4,3]) => 1
 */

/**
 * @param array $A  Numbers on a tape (array of integers)
 * @return int      Index to split tape for minimal difference
 */
function solution($A) {
    // Start with left side equal to first element
    $left = $A[0];

    // Start with right side equal to the rest of the elements
    $right = array_sum($A) - $A[0];

    // Initialize the minimum as absolute value of $left - $right
    $min = abs($left - $right);

    // Loop through the array (start at 1, because we started $left at $A[0]) and add to $left and subtract from $right
    for ($i=1; $i<count($A)-1; $i++) {
        $left += $A[$i];
        $right -= $A[$i];

        // If the current splice difference of tape (absolute value) is smaller than $min, update $min
        if (abs($left - $right) < $min) {
            $min = abs($left - $right);
        }
    }

    return $min;
}