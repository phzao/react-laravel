<?php

namespace App\Utils\CustomValidation;

/**
 * Class IntegerValidation
 *
 * @package App\Models\CustomValidation
 */
class IntegerValidation implements CustomValidationInterface
{
    /**
     * @param       $data
     * @param array $options
     *
     * @return bool
     */
    public function isValid($data, $options = []): bool
    {
        if (!empty($data) &&
            filter_var($data, FILTER_VALIDATE_INT)!==FALSE)
        {
            return true;
        }

        return false;
    }
}
