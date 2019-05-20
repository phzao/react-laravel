<?php

namespace App\Utils\ConvertData;

/**
 * Interface ConvertDataInterface
 * @package App\Interfaces\ConvertData
 */
interface ConvertDataInterface
{
    /**
     * @param      $data
     * @param null $options
     *
     * @return mixed
     */
    public function convert($data,
                            $options = null);
}
