<?php
declare(strict_types=1);

namespace Monogo\Weather\Model;

use Monogo\Weather\Api\Data\WeatherInterface;
use Magento\Framework\Model\AbstractExtensibleModel;

class Weather extends AbstractExtensibleModel implements WeatherInterface
{

    /**
     *
     */
    const CACHE_TAG = 'monogo_weather_weather';

    /**
     * @var string
     */
    protected $_cacheTag = 'monogo_weather_weather';

    /**
     * @var string
     */
    protected $_eventPrefix = 'monogo_weather_weather';

    /**
     * @var string
     */
    protected $_eventObject = 'weather';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Monogo\Weather\Model\ResourceModel\Weather::class);
    }

    /**
     * @return AbstractModel
     */
    public function beforeSave()
    {
        return parent::beforeSave();
    }

    /**
     * @inheritDoc
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * @inheritDoc
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setValue(int $value)
    {
        return $this->setData(self::VALUE, $value);
    }

    /**
     * @inheritDoc
     */
    public function getValue()
    {
        return $this->getData(self::VALUE);
    }


    /**
     * @inheritDoc
     */
    public function setLocation(string $location)
    {
        return $this->setData(self::LOCATION, $location);
    }

    /**
     * @inheritDoc
     */
    public function getLocation()
    {
        return $this->getData(self::LOCATION);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setCreateAt($setCreateAt)
    {
        return $this->setData(self::CREATED_AT, $setCreateAt);
    }

    /**
     * @return \Leadlion\DistributorDiscount\Api\Data\DatasheetExtensionInterface|\Magento\Framework\Api\ExtensionAttributesInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @param \Monogo\Weather\Api\Data\WeatherExtentsionInterface $extensionAttributes
     * @return DistributorInterface|void
     */
    public function setExtensionAttributes(\Monogo\Weather\Api\Data\WeatherExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

}
