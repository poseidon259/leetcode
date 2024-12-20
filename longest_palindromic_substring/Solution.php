<?php

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s)
    {
        $start = 0;
        $maxLength = 0;
        $stringLength = strlen($s);

        if ($stringLength <= 1) {
            return $s;
        }

        $expandAroundCenter = function ($left, $right) use ($s, $stringLength, &$start, &$maxLength) {
            while ($left >= 0 && $right < $stringLength && $s[$left] === $s[$right]) {
                $left--;
                $right++;
            }

            $length = $right - $left - 1;
            if ($length > $maxLength) {
                $maxLength = $length;
                $start = $left + 1;
            }
        };

        for ($i = 0; $i < $stringLength; $i++) {
            $expandAroundCenter($i, $i);
            $expandAroundCenter($i, $i + 1);
        }

        return substr($s, $start, $maxLength);
    }
}

$solution = new Solution();
print_r($solution->longestPalindrome("babad"));
