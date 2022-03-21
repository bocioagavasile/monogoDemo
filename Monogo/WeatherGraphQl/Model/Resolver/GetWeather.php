<?php

namespace Monogo\WeatherGraphQl\Model\Resolver;

use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\FilterGroupBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Monogo\Weather\Api\WeatherRepositoryInterface;
use Monogo\Weather\Api\Data\WeatherInterface;

class GetWeather implements ResolverInterface
{

    /**
     * @var WeatherRepositoryInterface
     */
    private $weatherRepository;

    /**
     * @var FilterBuilder
     */
    private $filterBuilder;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var FilterGroupBuilder
     */
    private $filterGroupBuilder;

    /**
     *
     */
    public function __construct(
        WeatherRepositoryInterface $weatherRepository,
        FilterBuilder $filterBuilder,
        FilterGroupBuilder $filterGroupBuilder,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->weatherRepository = $weatherRepository;
        $this->filterBuilder = $filterBuilder;
        $this->filterGroupBuilder = $filterGroupBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @inheritdoc
     */
    public function resolve(
        Field $field,
              $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {

        $response = [];

        $searchCriteria = '';

        $filterLocation = $this->filterBuilder->create()
            ->setField(WeatherInterface::LOCATION)
            ->setValue('Lublin')
            ->create();





        $latestWeather = $this->weatherRepository->getList($searchCriteria);

        $response['value'] = "50";
        $response['location'] = "Lublin";

        return $response;

    }
}
