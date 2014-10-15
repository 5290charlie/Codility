<?php
/**
 * Results: https://codility.com/demo/results/demoTEF85B-MZF/
 * Example: ([0,1,0,1,1]) => 5
 */

/**
 * @param array $A
 * @return int
 */
function solution($A) {
    $east = $passing = 0;

    foreach ($A as $x) {
        if ($x == 0) {
            $east++;
        } else if ($x == 1) {
            $passing += $east;
        } else {
            print "oops\n";
        }

        if ($passing > 1000000000) {
            return -1;
        }
    }

    return $passing;
}