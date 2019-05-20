<?php

namespace App\Repositories\Interfaces;

/**
 * Interface PersistRepositoryInterface
 *
 * @package App\Repositories\Interfaces
 */
interface PersistRepositoryInterface
{
    /**
     * @param array $array
     *
     * @return mixed
     */
    public function create(array $array);

    /**
     * @return mixed
     */
    public function update();

    /**
     * @param array $array
     *
     * @return mixed
     */
    public function fill(array $array = []);

    /**
     * @return mixed
     */
    public function destroy();
}
