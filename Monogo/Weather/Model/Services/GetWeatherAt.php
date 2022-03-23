<?php

namespace Monogo\Weather\Model\Services;

use Monogo\WeatherApi\Model\Api\WeatherApiInterface;

class GetWeatherAt implements GetWeatherAtInterface
{

    /**
     * @var WeatherApiInterface
     */
    protected $weatherApi;

    /**
     * @param WeatherApiInterface $weatherApi
     */
    public function __construct(
        WeatherApiInterface $weatherApi
    ) {
        $this->weatherApi = $weatherApi;
    }

    /**
     * @param string $location
     * @return mixed|void|null
     */
    public function execute($location)
    {
        $locationData = $this->weatherApi->getLocationSearch($location);
        if(isset($locationData['key'])){
            $weatherData = $this->weatherApi->getWeather($locationData['key']);

            //todo add more logic and validation
            if($weatherData){

                return $weatherData;

            }

            return "No data found for the location ". $locationData['city'];
        }
    }

}
