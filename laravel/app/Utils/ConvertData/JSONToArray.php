<?php

namespace App\Utils\ConvertData;

/**
 * Class JSONToArray
 * @package App\Interfaces\ConvertData
 */
class JSONToArray implements ConvertDataInterface
{
    /**
     * @param      $data
     * @param null $options
     *
     * @return mixed
     */
    public function convert($data, $options=null)
    {
        return json_decode($data, true);
    }
}
