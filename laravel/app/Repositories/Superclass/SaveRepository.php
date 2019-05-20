<?php

namespace App\Repositories\Superclass;

use App\Repositories\Interfaces\PersistRepositoryInterface;

/**
 * Class SaveRepository
 *
 * @package App\Repositories\Superclass
 */
class SaveRepository extends EntityRepository implements PersistRepositoryInterface
{
    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->entity->create($data);
    }

    /**
     * @return mixed|void
     */
    public function update()
    {
        $this->entity->save();
    }

    /**
     * @return bool|mixed|null
     * @throws \Exception
     */
    public function destroy()
    {
        return $this->entity->delete();
    }

    /**
     * @param array $array
     *
     * @return mixed|void
     */
    public function fill(array $array = [])
    {
        $this->entity->fill($array);
    }
}
