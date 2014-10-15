<?php
/**
 * Results: https://codility.com/demo/results/demoW4C8Q6-M5W/
 * Example: ([4,1,3,2]) => 1
 * Example: ([4,1,3])   => 0
 */

/**
 * @param array $A
 * @return int
 */
function solution($A) {
    $B = array();

    for($i=1; $i<=count($A); $i++) {
        $B[$i] = $i;
    }

    foreach ($A as $i => $x) {
        if (isset($B[$x])) {
            unset($B[$x]);
        } else {
            return 0;
        }
    }

    return (count($B) == 0) ? 1 : 0;
}