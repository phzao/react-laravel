<?php

namespace App\Repositories\Interfaces;

/**
 * Interface BasicRepositoryInterface
 *
 * @package App\Repositories
 */
interface BasicRepositoryInterface
{
    /**
     * @param $entity
     *
     * @return mixed
     */
    public function setEntity($entity);

    /**
     * @return mixed
     */
    public function getEntity();
}
