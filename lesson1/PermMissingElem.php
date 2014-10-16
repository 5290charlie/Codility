<?php
/**
 * Lesson 1 - PermMissingElem (easy)
 * Find the missing element in a given permutation.
 *
 * Results: https://codility.com/demo/results/demoT3WBFA-VSX/
 * Example: ([2,3,1,5]) => 4
 */

/**
 * @param array $A  Array of integers range [1..(N+1)]
 * @return int      Missing element
 */
function solution($A) {
    // Create a secondary array to track digits (used as a hashtable)
    $B = array();

    // Add all elements in $A to $B as indexes (value not used)
    foreach($A as $x) {
        $B[$x] = $x;
    }

    // Loop through all possible integer values [1..(N+1)] and check if isset as $B index. If not, we found it!
    for($i=1; $i<=count($A)+1; $i++) {
        if (!isset($B[$i])) {
            return $i;
        }
    }

    // Based on problem definition and assumptions, this should never occur...
    return 0;
}