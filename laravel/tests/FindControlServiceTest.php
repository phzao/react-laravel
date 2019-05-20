<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Class FindControlService
 */
final class FindControlServiceTest extends TestCase
{
    protected function createRequest(
        $method,
        $content,
        $uri = 'api/TMDAPIs',
        $server = ['CONTENT_TYPE' => 'application/json'],
        $parameters = [],
        $cookies = [],
        $files = []
    ) {
        $request = new \Illuminate\Http\Request;
        return $request->createFromBase(
            \Symfony\Component\HttpFoundation\Request::create(
                $uri,
                $method,
                $parameters,
                $cookies,
                $files,
                $server,
                $content
            )
        );
    }

    public function testCmdNotFoundToFind(): void
    {
        $request = $this->createRequest("GET", "");
        $request->route()->setParameter("name",'TMDAPIs.index');
//        $userAgent = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0';
//        $request = new \Illuminate\Http\Request();
//        $request->headers = (['User-Agent' => $userAgent]);
//        $request->headers = new \Symfony\Component\HttpFoundation\HeaderBag(['User-Agent' => $userAgent]);

//        $request->route()->getName();
//        $request->setMethod('GET');
//        $this->expectOutputString($request->route()->getName());

//        fwrite(STDERR, print_r($request->route(), TRUE));

        $requestGet    = new \App\Services\Control\RequestControlGet($request);
        $objectControl = new \App\Services\Control\ObjectControl();
        $findService   = new \App\Services\Automated\FindControlService($requestGet, $objectControl);

        $result = $findService->getResult();
        $this->assertEquals($result, http_response_code());
    }
}
