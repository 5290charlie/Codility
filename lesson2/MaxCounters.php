<?php
/**
 * Results: https://codility.com/demo/results/demoA4E4RP-MH6/
 * Example: (5, [3,4,4,6,1,4,4]) => [3,2,2,4,2]
 */

/**
 * @param int $N
 * @param array $A
 * @return array
 */
function solution($N, $A) {
    $counters = array();

    for($i=1; $i<=$N; ++$i) {
        $counters[$i] = 0;
    }

    $trigger = $N + 1;

    $update = $max = 0;

    foreach ($A as $x) {
        if ($x == $trigger) {
            $update = $max;
        } else if (isset($counters[$x])) {
            if ($counters[$x] < $update) {
                $counters[$x] = $update + 1;
            } else {
                $counters[$x]++;
            }

            if ($counters[$x] > $max) {
                $max = $counters[$x];
            }
        }
    }

    $ret = array();

    foreach ($counters as $c => $v) {
        if ($v < $update) {
            $ret[] = $update;
        } else {
            $ret[] = $v;
        }
    }

    return $ret;
}