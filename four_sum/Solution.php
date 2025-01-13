<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    function fourSum($nums, $target) {
        $result = [];
        sort($nums);
        $length = count($nums);

        for ($i = 0; $i < $length - 3; $i++) {

            if ($i > 0 && $nums[$i] === $nums[$i - 1]) {
                continue;
            }

            for ($j = $i + 1; $j < $length - 2; $j++) {

                if ($j > $i + 1 && $nums[$j] === $nums[$j - 1]) {
                    continue;
                }

                $left = $j + 1;
                $right = $length - 1;

                while($left < $right) {
                    $sum = $nums[$i] + $nums[$j] + $nums[$left] + $nums[$right];

                    if ($sum == $target) {
                        $result[] = [$nums[$i], $nums[$j], $nums[$left], $nums[$right]];

                        while ($left < $right && $nums[$left] === $nums[$left + 1]) $left++;
                        while ($left < $right && $nums[$right] === $nums[$right - 1]) $right--;

                        $left++;
                        $right--;

                    } elseif ($sum < $target) {
                        $left++;
                    } else {
                        $right--;
                    }
                }
            }
        }

        return $result;
    }
}

$solution = new Solution();
print_r($solution->fourSum([1,0,-1,0,-2,2], 0));