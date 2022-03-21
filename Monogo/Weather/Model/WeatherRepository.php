<?php

namespace Monogo\Weather\Model;

use Monogo\Weather\Api\WeatherRepositoryInterface;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Monogo\Weather\Api\Data\WeatherInterface;
use Monogo\Weather\Api\Data\WeatherSearchResultsInterfaceFactory;
use Monogo\Weather\Model\ResourceModel\Weather\CollectionFactory as WeatherCollectionFactory;

class WeatherRepository implements WeatherRepositoryInterface
{

    /**
     * @var WeatherFactory
     */
    private $weatherFactory;

    /**
     * @var WeatherCollectionFactory
     */
    private $weatherCollectionFactory;

    /**
     * @var WeatherSearchResultsInterfaceFactory
     */
    private $searchResultFactory;

    /**
     * @var JoinProcessorInterface
     */
    private $joinProcessor;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @param WeatherFactory $weatherFactory
     * @param WeatherCollectionFactory $weatherCollectionFactory
     * @param WeatherSearchResultsInterfaceFactory $weatherSearchResultsInterfaceFactory
     * @param JoinProcessorInterface $joinProcessor
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        WeatherFactory                       $weatherFactory,
        WeatherCollectionFactory             $weatherCollectionFactory,
        WeatherSearchResultsInterfaceFactory $weatherSearchResultsInterfaceFactory,
        JoinProcessorInterface               $joinProcessor,
        CollectionProcessorInterface         $collectionProcessor
    ) {
        $this->weatherFactory = $weatherFactory;
        $this->weatherCollectionFactory = $weatherCollectionFactory;
        $this->searchResultFactory = $weatherSearchResultsInterfaceFactory;
        $this->joinProcessor = $joinProcessor;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param int $id
     * @return Weather
     * @throws NoSuchEntityException
     */
    public function getByEntityId($id)
    {
        $weather = $this->weatherFactory->create();
        $weather->getResource()->load($weather, $id);
        if (!$weather->getId()) {
            throw new NoSuchEntityException(__('Unable to find weather entry with ID "%1"', $id));
        }
        return $weather;
    }

    /**
     * @param $value
     * @param $attributeCode
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getByAttribute($value, $attributeCode)
    {
        $weather = $this->weatherFactory->create();
        $weather->getResource()->load($weather, $value, $attributeCode);
        if (!$weather->getId()) {
            throw new NoSuchEntityException(
                __('The model with the "%1" "%2" wasn\'t found. Verify the ID and try again.', $value, $attributeCode)
            );
        }
        return $weather;
    }

    /**
     * @param WeatherInterface $weather
     * @return WeatherInterface
     */
    public function save(WeatherInterface $weather)
    {
        $weather->getResource()->save($weather);
        return $weather;
    }

    /**
     * @param WeatherInterface $weather
     * @return mixed|void
     * @throws \Exception
     */
    public function delete(WeatherInterface $weather)
    {
        $weather->getResource()->delete($weather);
    }

    /**
     * @param $weather
     * @return void
     * @throws NoSuchEntityException
     */
    public function deleteById(int $entityId)
    {
        $weather = $this->getByEntityId($entityId);
        $this->delete($weather);
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return WeatherSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): WeatherSearchResultInterface
    {
        $collection = $this->weatherCollectionFactory->create();
        $this->joinProcessor->process($collection);
        $this->collectionProcessor->process($searchCriteria, $collection);

        $weatherList = [];
        foreach ($collection->getItems() as $items) {
            $weatherList[$items->getId()] = $items->getData();
        }

        $searchResults = $this->searchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($weatherList);
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }


}
