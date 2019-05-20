<?php

namespace App\Utils\API\Interfaces;

/**
 * Interface APISearchInterface
 * @package App\Utils\API\Interfaces
 */
interface APISearchInterface
{
    /**
     * @param string $cmd
     *
     * @return bool
     */
    public function isValidSearchMethod(string $cmd):bool;

    /**
     * @return array
     */
    public function getMethodDetails():array;

    /**
     * @return array
     */
    public function getRulesToMethod():array;

    /**
     * @return string
     */
    public function getMethodToExecute():string;

    /**
     * @return mixed
     */
    public function getParameters();

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function addToQuery($data = []);

    /**
     * @param array $repositoryMethods
     *
     * @return mixed
     */
    public function mergeMethods($repositoryMethods = []);
}
