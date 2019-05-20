<?php

namespace App\Models\Interfaces;

/**
 * Interface EntityInterface
 *
 * @package App\Models\Interfaces
 */
interface EntityInterface
{
    /**
     * @param null $id
     *
     * @return array
     */
    public function rules($id = null): array;
}
