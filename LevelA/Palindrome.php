<?php

namespace Hackathon\LevelA;

// $str = 'abc';
// $result = $str;
// $len = strlen($str) - 1;
// for($i = $len; $i >= 0; $i--)
//     $result .= $str[$i];
// echo $result;
// echo "\n";

class Palindrome
{
    private $str;

    public function __construct($str)
    {
        $this->str = $str;
    }

    /**
     * This function creates a palindrome with his $str attributes
     * If $str is abc then this function return abccba
     *
     * @TODO
     * @return string
     */
    public function generatePalindrome()
    {
        $result = $str;
        $len = strlen($str) - 1;
        for($i = $len; $i >= 0; $i--)
            $result .= $str[$i];
        // echo $result;
        // echo "\n";
        return $result;
    }

}
