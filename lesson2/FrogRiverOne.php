<?php
/**
 * Results: https://codility.com/demo/results/demoWWVR6J-6CU/
 * Example: (5, [1,3,1,4,2,3,5,4]) => 6
 */

/**
 * @param int $X
 * @param array $A
 * @return int
 */
function solution($X, $A) {
    $B = array();

    for($i=1; $i<=$X; $i++) {
        $B[$i] = $i;
    }

    foreach ($A as $i => $x) {
        if (isset($B[$x])) {
            unset($B[$x]);
        }

        if (count($B) == 0) {
            return $i;
        }
    }

    return -1;
}