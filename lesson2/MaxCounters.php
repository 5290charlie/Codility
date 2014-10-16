<?php
/**
 * Lesson 2 - MaxCounters (medium)
 * Calculate the values of counters after applying all alternating operations:
 *      increase counter by 1; set value of all counters to current maximum.
 *
 * Results: https://codility.com/demo/results/demoA4E4RP-MH6/
 * Example: (5, [3,4,4,6,1,4,4]) => [3,2,2,4,2]
 */

/**
 * @param int $N    Number of counters
 * @param array $A  Array of commands (as integers)
 * @return array    Final counter states (array of integers)
 */
function solution($N, $A) {
    // Create an array to track counters
    $counters = array();

    // Initialize counters from [1..N]
    for($i=1; $i<=$N; ++$i) {
        $counters[$i] = 0;
    }

    // Commands are withing range [1..(N+1)], N+1 triggers update of all counters to maximum
    $trigger = $N + 1;

    // Initialize variables to track maximum updates
    $update = $max = 0;

    // Loop through commands
    foreach ($A as $x) {
        // If $x == N+1, then set all counters to the current maximum (do this by setting the update value to the current max)
        if ($x == $trigger) {
            $update = $max;
        } else if (isset($counters[$x])) {
            // If the value of this counter is less than $update, it wasn't maxed the last time the trigger command fired
            if ($counters[$x] < $update) {
                // Set it to the last maximum update and add 1 for this command
                $counters[$x] = $update + 1;
            } else {
                // Otherwise just increment this counter
                $counters[$x]++;
            }

            // Reset $max tracker if this counter is greater than the current $max value
            if ($counters[$x] > $max) {
                $max = $counters[$x];
            }
        }
    }

    // Array to return final counter states
    $ret = array();

    // Loop through counter values and insert into $ret for a zero-indexed array to return
    foreach ($counters as $c => $v) {
        // If a counter is still less than the last maximum trigger, it needs to be equal to $update
        if ($v < $update) {
            $ret[] = $update;
        } else {
            $ret[] = $v;
        }
    }

    return $ret;
}