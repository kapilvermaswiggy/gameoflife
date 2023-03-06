<?php
class Gameoflife {
    function testLife($m, $n) {
        if(empty($m)) {
            $m = 3;
        }
        if(empty($n)) {
            $m = 3;
        }
        $movement = [ [-1,-1], [-1,0], [-1,1], [0,-1], [0,1], [1,-1], [1,0], [1,1] ];
        $matrix = array();
        for($x=0; $x<$m; $x++) {
            $row = array();
            for($y=0; $y<$n; $y++) {
                array_push($row, rand(0,1));
            }
            $matrix[$x] = $row;
        }
        print_r($matrix,0);

        for($i=0; $i<$m; $i++) {
            for($j=0; $j<$n; $j++) {
                $activeCount = 0;
                foreach ($movement as $value) {
                    $p = $i+$value[0];
                    $q = $j+$value[1];
                    if($p >= 0 && $p < $m && $q >= 0 && $q < $n && ($matrix[$p][$q] == 1 || $matrix[$p][$q] == 2)) {
                        $activeCount++;
                    }
                }
                if($matrix[$i][$j] == 1) {
                    if($activeCount < 2 || $activeCount > 3) {
                        $matrix[$i][$j] = 2;
                    }
                } else {
                    if($activeCount == 3) {
                        $matrix[$i][$j] = 3;
                    }
                }
            }
        }
        for($i=0; $i<$m; $i++) {
            for ($j=0; $j<$n; $j++) {
                if($matrix[$i][$j] == 1 || $matrix[$i][$j] == 3) {
                    $matrix[$i][$j] = 1;
                } else {
                    $matrix[$i][$j] = 0;
                }
            }
        }
        echo "\n";
        print_r($matrix);
    }
}
?>