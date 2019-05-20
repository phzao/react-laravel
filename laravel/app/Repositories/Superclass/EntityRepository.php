<?php

namespace App\Repositories\Superclass;

use App\Repositories\Interfaces\BasicRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EntityRepository
 *
 * @package App\Repositories\Superclass
 */
class EntityRepository implements BasicRepositoryInterface
{
    /**
     * @var Model
     */
    protected $entity;

    /**
     * @param $entity
     *
     * @return mixed|void
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
    }
}
