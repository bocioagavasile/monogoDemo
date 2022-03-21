<?php
namespace Monogo\WeatherApi\Model\Api;

interface WeatherApiInterface
{

    /**
     * @return mixed
     */
    public function getLocations();

    /*
     *
     */
    public function getWeather($location);


}
