<?php

namespace App\Http\Controllers;
use App\Services\Automated\FindControlService;
use App\Services\Automated\SaveDataService;
use App\Services\Automated\UpdateDataService;
use App\Services\Persist\DeleteEntityService;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;


/**
 * Class Controller
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    /**
     * @param SaveDataService $validation
     *
     * @return string
     */
    public function store( )
    {
        return [];
    }

    /**
     * @param UpdateDataService        $persist
     *
     * @return string
     */
    public function update( )
    {
        return [];
    }

    /**
     * @param FindControlService $repository
     *
     * @return string
     */
    public function index( )
    {
        return [];
    }

    /**
     * @return mixed
     */
    public function show()
    {

    }

    /**
     * @return array\
     */
    public function destroy( )
    {
        return [];
    }
}

