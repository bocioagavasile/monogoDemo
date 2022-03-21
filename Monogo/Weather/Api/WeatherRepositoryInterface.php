<?php

namespace Monogo\Weather\Api;

use Magento\Framework\Exception\NoSuchEntityException;
use Monogo\Weather\Api\Data\WeatherInterface;
use Monogo\Weather\Api\Data\WeatherSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Monogo\Weather\Model\Weather;

interface WeatherRepositoryInterface
{
    /**
     * @param WeatherInterface $distributor
     * @return mixed
     */
    public function save(WeatherInterface $distributor);

    /**
     * @param $entityId
     * @return mixed
     */
    public function getByEntityId($entityId);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return WeatherSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param WeatherInterface $distributor
     * @return mixed
     */
    public function delete(WeatherInterface $distributor);

    /**
     * @param mixed $value
     * @param string $attributeCode
     * @return mixed
     */
    public function getByAttribute($value, $attributeCode);

}
