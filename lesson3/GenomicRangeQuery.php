<?php
/**
 * Lesson 3 - GenomicRangeQuery (medium)
 * Find the minimal nucleotide from a range of sequence DNA.
 *
 * Results: https://codility.com/demo/results/demoWFGPSU-J4C/
 * Example: ('CAGCCTA', [2,5,0], [4,5,6]) => [2,4,1]
 */

/**
 * @param string $S Genetic code sequence (A|C|G|T)
 * @param array $P  Array of sequence slice starting points
 * @param array $Q  Array of sequence slice ending points
 * @return array    Return array of lowest impact factor for each slice
 */
function solution($S, $P, $Q) {
    // Create an array to store return data
    $ret = array();

    // Define a lookup array for code characters to their corresponding impact factor
    $impact = array(
        'A' => 1,
        'C' => 2,
        'G' => 3,
        'T' => 4
    );

    // Initialize an array for each character to track it's number of appearances at every point of the sequence
    $track = array(
        'A' => array(),
        'C' => array(),
        'G' => array(),
        'T' => array()
    );

    // Split the sequence string into and array of characters
    $code = str_split($S);

    // Loop through each character
    foreach ($code as $i => $chr) {
        // Loop through our tracking array to track index $i of the sequence
        foreach ($impact as $c => $v) {
            // If index $i has not been tracked, initialize to 0
            if (!isset($track[$c][$i])) {
                $track[$c][$i] = 0;
            }

            // Set the value at the next index to the current count for $c at index $i
            $track[$c][$i+1] = $track[$c][$i];
        }

        // Increment the count tracking for character $chr (using +1 because $code is 0-indexed but $P & $Q are not)
        $track[$chr][$i+1]++;
    }

    // Loop through the start/end point arrays to find slices
    for ($i=0; $i<count($P); $i++) {
        // Set $to and $from indexes for current slice (add 1 to end point to ensure we count $Q[$i], not just $Q[$i-1])
        $from = $P[$i];
        $to   = $Q[$i]+1;

        // Loop through the impact lookup array (this will loop in ascending order, so the first one we find will be lowest)
        foreach ($impact as $c => $v) {
            // If this character has appeared in this slice, add it to $ret and break out of this loop to next slice
            if ($track[$c][$to] - $track[$c][$from] > 0) {
                $ret[] = $v;
                break;
            }
        }
    }

    return $ret;
}