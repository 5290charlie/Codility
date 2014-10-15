<?php
/**
 * Results: https://codility.com/demo/results/demoT3WBFA-VSX/
 * Example: ([2,3,1,5]) => 4
 */

/**
 * @param array $A
 * @return int
 */
function solution($A) {
    $B = array();

    foreach($A as $x) {
        $B[$x] = $x;
    }

    for($i=1; $i<=count($A)+1; $i++) {
        if (!isset($B[$i])) {
            return $i;
        }
    }

    return 0;
}