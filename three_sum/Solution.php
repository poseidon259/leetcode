<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums)
    {
        $result = [];
        sort($nums);
        $length = count($nums);

        for ($i = 0; $i < $length - 2; $i++) {
            if ($i > 0 && $nums[$i] === $nums[$i - 1]) {
                continue;
            }

            $target = -$nums[$i];
            $left = $i + 1;
            $right = $length - 1;

            while ($left < $right) {
                $sum = $nums[$left] + $nums[$right];
                if ($sum === $target) {
                    $result[] = [$nums[$i], $nums[$left], $nums[$right]];

                    while ($left < $right && $nums[$left] === $nums[$left + 1]) $left++;
                    while ($left < $right && $nums[$right] === $nums[$right - 1]) $right--;

                    $left++;
                    $right--;
                } elseif ($sum > $target) {
                    $right--;
                } else {
                    $left++;
                }
            }
        }

        return $result;
    }
}

$solution = new Solution();
print_r($solution->threeSum([-1,0,1,2,-1,-4]));