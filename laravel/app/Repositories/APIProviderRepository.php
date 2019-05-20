<?php

namespace App\Repositories;

use App\Models\APIProvider;
use App\Repositories\Superclass\FindRepository;

/**
 * Class APIProviderRepository
 * @package App\Repositories
 */
class APIProviderRepository extends FindRepository
{
    /**
     * @var array
     */
    private $myMethods = [
        "list" => [
            "method" => "findAllWithFilter",
            "fields" => [
                "name" => "string|max:50"
            ]
        ],
    ];

    /**
     * APIProviderRepository constructor.
     */
    public function __construct()
    {
        $this->entity = new APIProvider();
        $this->mergeMethods($this->myMethods);
    }
}
