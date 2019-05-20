<?php

namespace App\Utils\CustomValidation;

/**
 * Interface CustomValidationInterface
 *
 * @package App\Models\CustomValidation
 */
interface CustomValidationInterface
{
    /**
     * @param       $data
     * @param array $options
     *
     * @return bool
     */
    public function isValid($data, $options = []):bool ;
}
