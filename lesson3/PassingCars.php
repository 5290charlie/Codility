<?php
/**
 * Lesson 3 - PassingCars (easy)
 * Count the number of passing cars on the road.
 *
 * Results: https://codility.com/demo/results/demoTEF85B-MZF/
 * Example: ([0,1,0,1,1]) => 5
 */

/**
 * @param array $A  Array of traveling cars (0 is east, 1 is west)
 * @return int      Number of passing cars
 */
function solution($A) {
    // Initialize tracking variables for east and total passing count
    $east = $passing = 0;

    // Loop through cars
    foreach ($A as $x) {
        if ($x == 0) {
            // If car is traveling east, increment the count of cast moving east
            $east++;
        } else if ($x == 1) {
            // Otherwise, a west-bound car will pass all east-bound cars. So add $east to $passing
            $passing += $east;
        } else {
            // Based on problem definition and assumptions we should never get here!
            print "oops\n";
        }

        // "The function should return −1 if the number of passing cars exceeds 1,000,000,000."
        if ($passing > 1000000000) {
            return -1;
        }
    }

    return $passing;
}