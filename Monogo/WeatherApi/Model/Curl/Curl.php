<?php
declare(strict_types=1);

namespace Monogo\WeatherApi\Model\Curl;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Curl implements CurlInterface
{

    /**
     *
     */
    public function __construct(){

    }

    /**
     * @param $method
     * @param $uri
     * @param array $options
     * @return mixed|\Psr\Http\Message\ResponseInterface|void
     */
    public function call($method = 'GET', $uri = '', array $options = [])
    {
        $client = new Client();
        try{
            $response = $client->request($method, $uri, $options);
            return $response;
        } catch (GuzzleException $e){
            //todo treat exception
        }


    }

    /**
     * @param string $uri
     * @return \Psr\Http\Message\ResponseInterface|void
     */
    public function get($uri)
    {
        $client = new Client();
        try{
            $response = $client->get($uri);

            return $response;

        } catch (GuzzleException $e){
            //todo treat exception
        }


    }

}
