<?php
/**
 * Lesson 1 - FrogJmp (easy)
 * Count minimal number of jumps from position X to Y.
 *
 * Results: https://codility.com/demo/results/demoSQX4RZ-85R/
 * Example: (10, 85, 30) => 3
 */

/**
 * @param int $X    Current frog position
 * @param int $Y    Desired frog position
 * @param int $D    Fixed frog travel distance
 * @return int      Minimal number of jumps to get from $X to $Y
 */
function solution($X, $Y, $D) {
    // Find total distance (destination - origin) and divide by step size (and round up)
    return (int) ceil(($Y - $X) / $D);
}