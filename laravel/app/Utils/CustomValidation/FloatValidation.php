<?php

namespace App\Utils\CustomValidation;

/**
 * Class IntegerValidation
 *
 * @package App\Models\CustomValidation
 */
class FloatValidation implements CustomValidationInterface
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
            filter_var($data, FILTER_VALIDATE_FLOAT)!==FALSE)
        {
            return true;
        }

        return false;
    }
}
