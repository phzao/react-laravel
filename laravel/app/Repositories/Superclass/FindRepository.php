<?php

namespace App\Repositories\Superclass;

use App\Repositories\Interfaces\SearchRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class FindRepository
 *
 * @package App\Repositories\Superclass
 */
class FindRepository extends EntityRepository implements SearchRepositoryInterface

{
    use BeforeSearch;
    /**
     * @var array
     */
    protected $parameters = [];

    /**
     * @var array
     */
    protected $limitOrder = [];

    /**
     * @var string
     */
    protected $execute;

    /**
     * @var
     */
    protected $filterSelect = "*";

    /**
     * @var bool
     */
    protected $scope = false;

    /**
     * @var array
     */
    protected $method_details = [
        "details" => [
            "method"=>"find",
            "fields"=>[
                "id" => "required|integer"
            ]
        ],
        "list"    => [
            "method"=>"findTranslateEnum",
            "fields"=>[]
        ],
        "myForm" => [
            "method" => "myForm",
            "fields"=>[],
        ],
        "myFormUpdate" => [
            "method"=>"myFormUpdate",
            "fields"=>[
                "id" => "required|integer",
            ],
        ],
        "listWithRelation" => [
            "method"=>"listWithRelation",
            "fields"=>[
                "id"=>"integer",
            ],
        ],
    ];
    
    /**
     * @var array
     */
    protected $method_class;

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function find($data = [])
    {
        if (!$data) {
            $data = $this->parameters;
        }

        $entity = $this->entity
                       ->where($data)
                       ->select($this->filterSelect)
                       ->first();

        if (!$entity) {
            throw new NotFoundHttpException("Register not found!!");
        }

        return $entity;
    }

    public function findBetween($collumn = 'created_at', $data = [])
    {
        if (!$data) {
            $data = $this->parameters;
        }
        
        $entities = $this->entity
                         ->whereBetween($collumn, $data)
                         ->orderBy('due_date', 'dasc')
                         ->get();
        if (empty($entities)) {
            throw new NotFoundHttpException("Register not Found");
        }

        return $entities;
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function findAllWithLimit($data = [])
    {
        $this->fixParametersLimit();
        if (!$data) {
            $data = $this->parameters;
        }

        $entities = $this->entity::where($data)
            ->orderBy($this->limitOrder["orderBy"], $this->limitOrder["order"])
            ->take((int) $this->limitOrder["take"])
            ->get();

        return $entities;
    }

    /**
     * @param int   $paginate
     * @param array $filter
     *
     * @return mixed
     */
    public function findWithPaginate($paginate=5, $filter = [])
    {
        return $this->entity
                    ->paginate($paginate);
    }

    /**
     * @param string $cmd
     *
     * @return bool
     */
    public function isValidSearchMethod(string $cmd): bool
    {
        if (isset($this->method_details[$cmd]) &&
            method_exists($this, $this->method_details[$cmd]['method'])) {

            return true;
        }
        return false;
    }

    /**
     * @param $cmd
     */
    public function setMethodName($cmd)
    {
        $this->method_class = $this->method_details[$cmd];
    }

    /**
     * @return array
     */
    public function getMethodDetails(): array
    {
        return $this->method_details;
    }

    /**
     * @return string
     */
    public function getMethodToExecute(): string
    {
        return $this->method_class["method"];
    }

    public function getEnum()
    {
        if (!empty($this->method_class["enum"])) {
            return $this->method_class["enum"];
        }

        return false;
    }

    /**
     * Receive from specific repository the new methods
     * @param $repositoryMethods
     */
    public function replaceMethods(array $repositoryMethods)
    {
        $this->method_details = $repositoryMethods;
    }

    /**
     * @param $repositoryMethods
     */
    public function mergeMethods($repositoryMethods)
    {
        $this->method_details = array_merge($this->method_details,
                                            $repositoryMethods);
    }

    /**
     * @param array $data
     *
     * @return mixed|void
     */
    public function addToQuery($data = [])
    {
        array_push($this->parameters, $data);
    }

    /**
     * @return array
     */
    public function getRulesToMethod(): array
    {
        return $this->method_class["fields"];
    }

    /**
     * @return bool|mixed
     */
    public function getCondition()
    {
        if(!isset($this->method_class["condition"])){
            return false;
        }

        return $this->method_class["condition"];
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public function findOneWithFilter($data = [])
    {
        if (!$data) {
            $data = $this->parameters;
        }

        $warehouse = $this->entity
                         ->where($data)
                         ->first();
        if (empty($warehouse)) {
            throw new NotFoundHttpException("Registry do not exist!");
        }
        return $warehouse;
    }

    /**
     * @param array  $data
     * @param string $column
     * @param string $order
     *
     * @return mixed
     */
    public function findAllWithFilter($data = [],
                                      $column = "id",
                                      $order = 'asc')
    {
        if (!$data) {
            $data = $this->parameters;
        }

        return $this->entity
                    ->where($data)
                    ->orderBy($column, $order)
                    ->get();
    }

}
