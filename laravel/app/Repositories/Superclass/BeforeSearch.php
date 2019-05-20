<?php

namespace App\Repositories\Superclass;

/**
 * Trait BeforeSearch
 *
 * @package App\Repositories\Superclass
 */
trait BeforeSearch
{
    /**
     * @param array $array
     *
     * @return array
     */
    function getParameters(array $array = [])
    {
        $fields = $this->getRulesToMethod();

        foreach ($array as $key=>$item)
        {
            if (!in_array($key, $fields) &&
                !array_key_exists($key, $fields)) {
                unset($array[$key]);
            }
        }

        return $array;
    }

    function getFilterSelect(array $array=[])
    {

        if (array_key_exists("filterSelect", $array))
        {
            $this->filterSelect = explode(",", $array['filterSelect']);
            unset($array['filterSelect']);
        }

        return $array;
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    function prepareToFind($data = [])
    {
        $this->getFilterSelect($data);
        $parameters = $this->getParameters($data);
        $condition  = $this->getCondition();

        if (empty($parameters) && !empty($condition)) {
            $parameters = $condition;
        }

        $this->addToQuery($parameters);
        $this->mergeParameters();

        return $this->getMethodToExecute();
    }

    function mergeParameters()
    {
        $this->parameters = array_reduce($this->parameters,
                                   'array_merge',
                                   array());
    }

    function fixParametersLimit()
    {
        $this->limitOrder = $this->parameters;
        foreach ($this->limitOrder as $key=>$parameter)
        {
            if (strpos($key,"history")!== false) {
                unset($this->limitOrder[$key]);
            }
            if (strpos($key,"history")=== false) {
                unset($this->parameters[$key]);
            }
        }

        if (empty($this->limitOrder["order"])) {
            $this->limitOrder["order"] = "desc";
        }

        if (empty($this->limitOrder["orderBy"])) {
            $this->limitOrder["orderBy"] = "id";
        }

        if (empty($this->limitOrder["take"])) {
            $this->limitOrder["take"] = 2;
        }
    }

}
