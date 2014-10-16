<?php
/**
 * Lesson 2 - MissingInteger (medium)
 * Find the minimal positive integer not occurring in a given sequence.
 *
 * Results: https://codility.com/demo/results/demoT7T7VH-GMR/
 * Example: ([1,3,6,4,1,2]) => 5
 */

/**
 * @param array $A  Array of integers
 * @return int      The minimal positive integer not occurring in $A
 */
function solution($A) {
    // Create secondary array to track integers (used as hashtable)
    $B = array();

    // Initialize a variable to track the maximum integer in the array
    $max = 0;

    // Loop through $A
    foreach ($A as $x) {
        // Rest $max if needed
        if ($x > $max) {
            $max = $x;
        }

        // If value not tracked in $B, add it as an index
        if (!isset($B[$x])) {
            $B[$x] = $x;
        }
    }

    // Beginning at 1, loop through $B until $max
    for ($i=1; $i<=$max; ++$i) {
        // If a value from [1..$max] doesn't exist in $B, we've found the answer!
        if (!isset($B[$i])) {
            return $i;
        }
    }

    // Otherwise, all numbers exist from [1..$max] and the minimal positive integer will be $max+1
    return $max + 1;
}