<?php
/**
 * Lesson 3 - MinAvgTwoSlice (medium)
 * Find the minimal average of any slice containing at least two elements.
 *
 * Results: https://codility.com/demo/results/demoVZP856-58T/
 * Example: ([4,2,2,5,1,5,8]) => 1
 */

/**
 * @param array $A  Array of integers
 * @return int      Index of the first element in a slice with the minimal average
 */
function solution($A) {
    // Define $N as the number of elements in $A
    $N = count($A);

    // Initialize $min as the average of the first two elements
    $min = ($A[0] + $A[1]) / 2;

    // Initialize $pos to track the return index at 0
    $pos = 0;

    // Loop through elements and calculate averages of the next 2 & 3 elements slices
    for ($i=0; $i<($N-2); $i++) {
        // Check 2 element slice (starting at $i)
        if (($A[$i] + $A[$i+1]) / 2 < $min) {
            // If this is less than $min, reset $min and $pos
            $min = ($A[$i] + $A[$i+1]) / 2;
            $pos = $i;
        }

        // Check 3 element slice (starting at $i)
        if (($A[$i] + $A[$i+1] + $A[$i+2]) / 3 < $min) {
            // If this is less than $min, reset $min and $pos
            $min = ($A[$i] + $A[$i+1] + $A[$i+2]) / 3;
            $pos = $i;
        }
    }

    // Do a final 2 element check on the last two elements (wouldn't be checked in the loop above)
    if (($A[$N-2] + $A[$N-1]) / 2 < $min) {
        // If this is less than $min, reset $min and $pos ($min doesn't matter at this point, but for consistency sake..)
        $min = ($A[$N-2] + $A[$N-1]) / 2;
        $pos = $N-2;
    }

    return $pos;
}