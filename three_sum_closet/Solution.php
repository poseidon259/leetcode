<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosest($nums, $target)
    {
        $closetSum = PHP_INT_MAX;
        $arrayLength = count($nums);
        sort($nums);

        for ($i = 0; $i < $arrayLength; $i++) {
            $left = $i + 1;
            $right = $arrayLength - 1;

            while ($left < $right) {
                $sum = $nums[$i] + $nums[$left] + $nums[$right];

                if (abs($target - $sum) < abs($target - $closetSum)) {
                    $closetSum = $sum;
                }

                if ($sum > $target) {
                    $right--;
                } elseif ($sum < $target) {
                    $left++;
                } else {
                    return $sum;
                }
            }
        }

        return $closetSum;
    }
}

$solution = new Solution();
print_r($solution->threeSumClosest([0, 0, 0], 1));