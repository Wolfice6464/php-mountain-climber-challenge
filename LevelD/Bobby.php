<?php

namespace Hackathon\LevelD;

class Bobby
{
    public $wallet = array();
    public $total;

    public function __construct($wallet)
    {
        $this->wallet = $wallet;
        $this->computeTotal();
    }

    /**
     * @TODO
     *
     * @param $price
     *
     * @return bool|int|string
     */
    public function giveMoney($price)
    {
        $this->computeTotal();
        if ($price > $this->total) {
            return false;
        }

        $new_wallet = array();
        $other_list = array();
        foreach ($this->wallet as $element) {
            if (is_numeric($element)) {
                array_push($new_wallet, $element);
            }
            else {
                array_push($other_list, $element);
            }
        }

        sort($new_wallet, SORT_NUMERIC);

        $lost_money = 0;
        while ($price > 0) {
            if ($price - end($new_wallet) >= 0) {
                $lost_money = end($new_wallet);
                array_pop($new_wallet);
                $price -= $lost_money;
            }
            else {
                foreach ($new_wallet as $element) {
                    if ($element >= $price) {
                        $acc = array_search($element, $new_wallet);
                        unset($new_wallet[$acc]);
                        $price -= $element;

                        $this->addNotNumericElement($other_list, $new_wallet);
                        $this->computeTotal();
                        
                        return true;
                    }
                }
            }
        }
        
        $this->addNotNumericElement($other_list, $new_wallet);
        $this->computeTotal();

        return true;
    }

    public function addNotNumericElement($other_list, $new_wallet)
    {
        foreach ($other_list as $element) {
            array_push($new_wallet, $element);
        }

        $this->wallet = $new_wallet;
    }

    /**
     * This function updates the amount of your wallet
     */
    private function computeTotal()
    {
        $this->total = 0;

        foreach ($this->wallet as $element) {
            if (is_numeric($element)) {
                $this->total += $element;
            }
        }
    }
}
