<?php
/**
 * Lesson 2 - FrogRiverOne (easy)
 * Find the earliest time when a frog can jump to the other side of a river.
 *
 * Results: https://codility.com/demo/results/demoWWVR6J-6CU/
 * Example: (5, [1,3,1,4,2,3,5,4]) => 6
 */

/**
 * @param int $X    Desired frog position
 * @param array $A  Falling leaves (array of integers representing leaf position)
 * @return int      Earliest time (index of $A) frog can jump across the river (-1 if never)
 */
function solution($X, $A) {
    // Create secondary array to track frog movements (used as a hashtable)
    $B = array();

    // Populate $B with all positions needed to cross the river [1..X]
    for($i=1; $i<=$X; $i++) {
        $B[$i] = $i;
    }

    // Loop through all the leaves
    foreach ($A as $i => $x) {

        // If position $x still exists as an index of $B, this is the first leaf for that position.
        if (isset($B[$x])) {
            // Unset $x index of $B to track this leaf position
            unset($B[$x]);
        }

        // If $B is empty, frog has visited leaves across the entire river... HE MADE IT!
        if (count($B) == 0) {
            return $i;
        }
    }

    // If we get here frog has missed a position and couldn't cross the river :(
    return -1;
}