<?php

class Solution
{

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height)
    {
        $left = 0;
        $right = count($height) - 1;
        $maxArea = 0;

        while ($left < $right) {
            // Calculate the area, by multiplying the minimum height of the two pointers by the distance between them
            $area = min($height[$left], $height[$right]) * ($right - $left);

            // Update the max area
            $maxArea = max($maxArea, $area);

            // Move the pointer with the smaller height
            if ($height[$left] < $height[$right]) {
                $left++;
            } else {
                $right--;
            }
        }

        return $maxArea;
    }
}

$solution = new Solution();
echo $solution->maxArea([1, 8, 6, 2, 5, 4, 8, 3, 7]); // 49