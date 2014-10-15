<?php
/**
 * Results: https://codility.com/demo/results/demoSQX4RZ-85R/
 * Example: (10, 85, 30) => 3
 */

/**
 * @param int $X
 * @param int $Y
 * @param int $D
 * @return int
 */
function solution($X, $Y, $D) {
    return (int) ceil(($Y - $X) / $D);
}