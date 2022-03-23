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
     * @inheritDoc
     */
    public function getWeather($locationKey)
    {
        $url = $this->createConditionUrl($locationKey).'?apikey=mJFdVeq0XLvnjfQKELmrHedGn8oueYAI';

        $response = $this->curl->get($url);
        $data = json_decode($response->getBody()->getContents());

        var_dump($data);
        die();

    }

    /**
     * @inheritDoc
     */
    public function getLocationSearch($string)
    {

        $url = self::LOCATION_SEARCH_URL.'?apikey=mJFdVeq0XLvnjfQKELmrHedGn8oueYAI&q='.$string;

        $response = $this->curl->get($url);
        $data = json_decode($response->getBody()->getContents());

        $locationData = [];
        if(isset($data[0])){
            $firstLocation = $data[0];
            $locationData['city'] = $firstLocation->LocalizedName;
            $locationData['key'] = $firstLocation->Key;
        }
        return $locationData;

    }

    /**
     * @param string $locationKey
     * @return void
     */
    private function createConditionUrl($locationKey){

        return self::CURRENT_CONDITION_URL.'/'.$locationKey;

    }





}
