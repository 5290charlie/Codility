<?php
/**
 * Results: https://codility.com/demo/results/demoT7T7VH-GMR/
 * Example: ([1,3,6,4,1,2]) => 5
 */

/**
 * @param array $A
 * @return int
 */
function solution($A) {
    $B = array();

    $max = 0;

    foreach ($A as $x) {
        if ($x > $max) {
            $max = $x;
        }

        if (!isset($B[$x])) {
            $B[$x] = $x;
        }
    }

    for ($i=1; $i<=$max; ++$i) {
        if (!isset($B[$i])) {
            return $i;
        }
    }

    return $max + 1;
}