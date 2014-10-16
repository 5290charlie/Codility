<?php
/**
 * Lesson 2 - PermCheck (easy)
 * Check whether array A is a permutation.
 *
 * Results: https://codility.com/demo/results/demoW4C8Q6-M5W/
 * Example: ([4,1,3,2]) => 1
 * Example: ([4,1,3])   => 0
 */

/**
 * @param array $A  Array of integers with range [1..N]
 * @return int      1 if permutation (every number within [1..N] present exactly once), 0 otherwise
 */
function solution($A) {
    // Create secondary array to track needed values for permutation (used as a hashtable)
    $B = array();

    // Insert all possible permutation integers [1..N] into $B as index
    for($i=1; $i<=count($A); $i++) {
        $B[$i] = $i;
    }

    // Loop through each value in the given array
    foreach ($A as $i => $x) {
        if (isset($B[$x])) {
            // If we haven't seen $x yet, unset the corresponding index to track this value in the permutation
            unset($B[$x]);
        } else {
            // If we get here it means we've already seen $x, therefore not a valid permutation (return 0)
            return 0;
        }
    }

    // The array is a permutation if (and only if) all the indexes of $B have been unset
    return (count($B) == 0) ? 1 : 0;
}