<?php

namespace Monogo\Weather\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface WeatherSearchResultsInterface extends SearchResultsInterface
{

    /**
     * @return \Magento\Framework\Api\ExtensibleDataInterface[]
     */
    public function getItems();

    /**
     * @param array $items
     * @return SearchResultsInterface
     */
    public function setItems(array $items);

}
