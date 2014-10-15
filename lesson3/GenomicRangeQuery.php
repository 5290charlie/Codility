<?php
/**
 * Results: https://codility.com/demo/results/demoWFGPSU-J4C/
 * Example: ('CAGCCTA', [2,5,0], [4,5,6]) => [2,4,1]
 */

/**
 * @param string $S
 * @param array $P
 * @param array $Q
 * @return array
 */
function solution($S, $P, $Q) {
    $ret = array();

    $impact = array(
        'A' => 1,
        'C' => 2,
        'G' => 3,
        'T' => 4
    );

    $track = array(
        'A' => array(),
        'C' => array(),
        'G' => array(),
        'T' => array()
    );

    $code = str_split($S);

    foreach ($code as $i => $chr) {
        foreach ($impact as $c => $v) {
            if (!isset($track[$c][$i])) {
                $track[$c][$i] = 0;
            }

            $track[$c][$i+1] = $track[$c][$i];
        }

        $track[$chr][$i+1]++;
    }

    for ($i=0; $i<count($P); $i++) {
        $from = $P[$i];
        $to   = $Q[$i]+1;

        foreach ($impact as $c => $v) {
            if ($track[$c][$to] - $track[$c][$from] > 0) {
                $ret[] = $v;
                break;
            }
        }
    }

    return $ret;
}