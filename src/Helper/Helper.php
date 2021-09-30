<?php

namespace Xenon\PortWallet\Helper;

class Helper
{
    /**
     * Data Validation
     * @param $number
     * @return bool
     * @version v0.0.1
     * @since v0.0.1
     */
    public static function numberValidation($number): bool
    {
        $validCheckPattern = "/^(?:\+88|01)?(?:\d{11}|\d{13})$/";
        if (preg_match($validCheckPattern, $number)) {
            if (preg_match('/^(?:01)\d+$/', $number)) {
                $number = '+88' . $number;
            }

            return true;
        }

        return false;
    }
}
