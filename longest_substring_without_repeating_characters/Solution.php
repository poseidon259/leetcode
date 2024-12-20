<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    public function lengthOfLongestSubstring($s)
    {
        $strLen = strlen($s);
        $maxLength = 0;
        $hashMap = [];
        $i = 0;
        $j = 0;
        while ($j < $strLen) {
            $iValue = $s[$i];
            $jValue = $s[$j];
            if (!isset($hashMap[$jValue])) {
                $hashMap[$jValue] = 1;
                $j++;
                $maxLength = max($maxLength, $j - $i);
            } else {
                unset($hashMap[$iValue]);
                $i++;
            }
            echo $maxLength;
        }

        return $maxLength;
    }
}

$solution = new Solution();
echo $solution->lengthOfLongestSubstring("pwwkew");