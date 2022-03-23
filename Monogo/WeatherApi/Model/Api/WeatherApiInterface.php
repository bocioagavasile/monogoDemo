<?php
namespace Monogo\WeatherApi\Model\Api;

interface WeatherApiInterface
{

    CONST LOCATION_SEARCH_URL = "http://dataservice.accuweather.com/locations/v1/cities/search";
    CONST CURRENT_CONDITION_URL = "http://dataservice.accuweather.com/currentconditions/v1/";


    /**
     * @param string $string
     * @return mixed
     */
    public function getLocationSearch($string);

    /*
     *
     */
    public function getWeather($location);


}
