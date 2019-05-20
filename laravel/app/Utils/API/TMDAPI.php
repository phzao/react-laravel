<?php

namespace App\Utils\API;

use App\Services\APISources\APISourceInterface;
use App\Services\Control\RequestAPIControl;
use App\Utils\API\Superclass\APISearch;
use App\Utils\ConvertData\JSONToArray;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Classe responsavel por receber os dados da API e devolver tratado.
 * Class TMDAPI
 * @package App\Utils\API
 */
class TMDAPI extends APISearch implements APISourceInterface
{
    /**
     * Em uma versao controlada via DB essa variavel sera inutilizada
     * @var string
     */
    private $url = "https://api.themoviedb.org/3";

    /**
     * @var string
     */
    private $api_key = "1f54bd990f1cdfb230adb312546d765d";

    /**
     * Lista de metodos que serao chamados dinamicamente
     * @var array
     */
    private $myMethods = [
        "getUpcomingMovies" => [
            "method" => "getUpcoming",
            "fields" => [
                "page" => "integer",
            ]
        ],
        "getFilteredMovies" => [
            "method" => "getFiltered",
            "fields" => [
                "query" => "string|max:100",
                "pages" => "integer",
            ]
        ],
    ];

    /**
     * TMDAPI constructor.
     *
     * @param RequestAPIControl $api_request
     */
    public function __construct(RequestAPIControl $api_request)
    {
        parent::__construct($api_request);
        $this->mergeMethods($this->myMethods);
    }

    /**
     * @param array $data
     *
     * @return mixed|string
     */
    public function getUpcoming($data = [])
    {
        if (empty($data)) {
            $data = $this->parameters;
        }

        $page = $this->getNumbersOfPages($data["page"]);

        $result = [];

        for ($i = 1; $i <= $page; $i++)
        {
            $url  = $this->getLink("/movie/upcoming", ["page"=>$i]);

            $this->api_request->getDataAPI($url, "GET");

            $response = $this->api_request->getResultAPI(new JSONToArray());

            $this->putImagesPathOnList($response["results"]);

            $result = array_merge($result, $response["results"]);
        }

        return [
            "results" => $result
        ];
    }

    /**
     * @param int $pages
     *
     * @return int
     */
    private function getNumbersOfPages(int $pages)
    {
        return (int) ($pages/2)/10;
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function getFiltered($data = [])
    {
        if (empty($this->parameters)) {
            throw new NotFoundHttpException("Parameter is required");
        }

        $url = $this->getLink("/search/movie");
        $url = $this->addParameters($url, $this->parameters);

        $this->api_request->getDataAPI($url, "GET");

        $response = $this->api_request->getResultAPI(new JSONToArray());

        $this->putImagesPathOnList($response["results"]);

        return $response;
    }

    /**
     * @param $list
     *
     * @return array
     */
    public function putImagesPathOnList(&$list)
    {
        $url = $this->getLink("/configuration");
        $this->api_request->getDataAPI($url, "GET");

        $configuration = $this->api_request->getResultAPI(new JSONToArray());

        if (empty($configuration)) {
            return [];
        }

        $image = $configuration["images"];

        foreach($list as $key=>$item)
        {
            $base = $image["base_url"];

            foreach($image["poster_sizes"] as $poster)
            {
                if (!empty($list[$key]["poster_path"])) {
                    $list[$key]["posters"][$poster] = $base.$poster.$item["poster_path"];
                }
            }
        }
    }

    /**
     * @param string $url
     * @param array  $data
     *
     * @return string
     */
    private function addParameters(string $url, $data = [])
    {
        foreach ($data as $key => $parameter)
        {
            $url.= "&$key=".urlencode($parameter);
        }

        return $url;
    }

    /**
     * @param string $addToUrl
     * @param array  $parameters
     *
     * @return string
     */
    private function getLink(string $addToUrl, $parameters = [])
    {
        $url = $this->url.$addToUrl."?api_key=".$this->api_key;

        if (empty($parameters)) {
            return $url;
        }

        foreach ($parameters as $key => $parameter)
        {
            $url.= "&$key=$parameter";
        }

        return $url;
    }
}
