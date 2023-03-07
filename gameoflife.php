<?php
class Gameoflife {
    function testLife($row, $column) {
        /*row count not provided then take default value*/
        if(empty($row)) {
            $row = 3;
        }
        /*column count not provided then take default value*/
        if(empty($column)) {
            $column = 3;
        }
        $movement = [ [-1,-1], [-1,0], [-1,1], [0,-1], [0,1], [1,-1], [1,0], [1,1] ];

        /*create a matrix basis of row & column provided*/
        $matrix = array();
        for($x=0; $x<$row; $x++) {
            $data = array();
            for($y=0; $y<$column; $y++) {
                array_push($data, rand(0,1));
            }
            $matrix[$x] = $data;
        }
        echo "Original Output\n";
        print_r($matrix,0);

        for($i=0; $i<$row; $i++) {
            for($j=0; $j<$column; $j++) {
                $activeCount = 0;
                foreach ($movement as $value) {
                    $p = $i+$value[0];
                    $q = $j+$value[1];
                    if($p >= 0 && $p < $row && $q >= 0 && $q < $column && ($matrix[$p][$q] == 1 || $matrix[$p][$q] == 2)) {
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
        for($i=0; $i<$row; $i++) {
            for ($j=0; $j<$column; $j++) {
                if($matrix[$i][$j] == 1 || $matrix[$i][$j] == 3) {
                    $matrix[$i][$j] = 1;
                } else {
                    $matrix[$i][$j] = 0;
                }
            }
        }
        echo "\nFinal Output\n";
        print_r($matrix);
    }
}
?>
