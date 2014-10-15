<?php
/**
 * Results: https://codility.com/demo/results/demoVZP856-58T/
 * Example: ([4,2,2,5,1,5,8]) => 1
 */

/**
 * @param array $A
 * @return int
 */
function solution($A) {
    $N = count($A);

    $min = ($A[0] + $A[1]) / 2;
    $pos = 0;

    for ($i=0; $i<($N-2); $i++) {
        if (($A[$i] + $A[$i+1]) / 2 < $min) {
            $min = ($A[$i] + $A[$i+1]) / 2;
            $pos = $i;
        }

        if (($A[$i] + $A[$i+1] + $A[$i+2]) / 3 < $min) {
            $min = ($A[$i] + $A[$i+1] + $A[$i+2]) / 3;
            $pos = $i;
        }
    }

    if (($A[$N-2] + $A[$N-1]) / 2 < $min) {
        $min = ($A[$N-2] + $A[$N-1]) / 2;
        $pos = $N-2;
    }

    return $pos;
}