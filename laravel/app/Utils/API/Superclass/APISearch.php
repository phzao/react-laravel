<?php

namespace App\Utils\API\Superclass;

use App\Services\Control\RequestAPIControl;
use App\Utils\API\Interfaces\APISearchInterface;

/**
 * Class APISearch
 * @package App\Utils\API\Superclass
 */
class APISearch implements APISearchInterface
{
    use PrepareSearch;

    /**
     * @var array
     */
    protected $method_details = [];

    protected $method_class;

    /**
     * @var array
     */
    protected $parameters = [];

    protected $limitOrder;

    /**
     * @var RequestAPIControl
     */
    protected $api_request;

    /**
     * APISearch constructor.
     *
     * @param RequestAPIControl $api_request
     */
    public function __construct(RequestAPIControl $api_request)
    {
        $this->api_request = $api_request;
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
     * @param array $repositoryMethods
     *
     * @return mixed|void
     */
    public function mergeMethods($repositoryMethods = [])
    {
        $this->method_details = array_merge($this->method_details,
                                            $repositoryMethods);
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
}
