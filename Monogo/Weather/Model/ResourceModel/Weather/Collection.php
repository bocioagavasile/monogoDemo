<?php
declare(strict_types=1);

namespace Monogo\Weather\Model\ResourceModel\Weather;

use Monogo\Weather\Model\Weather;
use Monogo\Weather\Model\ResourceModel\Weather as ResourceWheather;
use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 */
class Collection extends AbstractCollection implements SearchResultInterface
{
    /**
     * @var $aggregations
     */
    protected $aggregations;

    /**
     * Collecton constructor
     */
    protected function _construct()
    {
        $this->_init(Weather::class, ResourceWheather::class);
    }

    /**
     * @return \Magento\Framework\Api\Search\AggregationInterface|void
     */
    public function getAggregations()
    {
        $this->aggregations;
    }

    /**
     * @param $aggregations
     * @return Collection|void
     */
    public function setAggregations($aggregations)
    {
        $this->aggregations = $aggregations;
    }

    /**
     * @return \Magento\Framework\Api\Search\SearchCriteriaInterface|null
     */
    public function getSearchCriteria()
    {
        return null;
    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
     * @return $this
     */
    public function setSearchCriteria(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria = null)
    {
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->getSize();
    }

    /**
     * Set total count.
     * @param int $totalCount
     * @return $this
     */
    public function setTotalCount($totalCount)
    {
        return $this;
    }

    /**
     * Set items list
     * @param \Magento\Framework\Api\ExtensibleDataInterface[] $items
     * @return $this
     */
    public function setItems(array $items = null)
    {
        return $this;
    }
}
