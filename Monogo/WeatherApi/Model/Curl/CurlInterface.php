<?php

namespace Monogo\WeatherApi\Model\Curl;

interface CurlInterface
{

    /**
     * @param $method
     * @param $uri
     * @param array $options
     * @return mixed
     */
    public function call($method, $uri = '', array $options = []);

    /**
     * @param string $uri
     * @return \Psr\Http\Message\ResponseInterface|void
     */
    public function get($uri);


}
