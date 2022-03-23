<?php

namespace Monogo\Weather\Model\Services;

interface GetWeatherAtInterface
{

    /**
     * @param string $location
     * @return null|mixed
     */
   public function execute($location);

}
