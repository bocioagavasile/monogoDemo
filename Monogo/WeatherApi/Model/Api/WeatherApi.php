<?php

namespace Monogo\WeatherApi\Model\Api;

use Monogo\WeatherApi\Model\Curl\CurlInterface;

class WeatherApi implements WeatherApiInterface
{

    /**
     * @var CurlInterface
     */
    protected $curl;

    /**
     * @param CurlInterface $curl
     */
    public function __construct(
        CurlInterface $curl
    ) {
        $this->curl = $curl;
    }

    /**
     * @param $location
     * @return void
     */
    public function getWeather($location)
    {
        // TODO: Implement getWeather() method.
    }

    /**
     * @return mixed|void
     */
    public function getLocations()
    {
        // TODO: Implement getLocations() method.
    }

}
