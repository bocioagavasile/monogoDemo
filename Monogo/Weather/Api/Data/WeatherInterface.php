<?php

namespace Monogo\Weather\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * @api
 */
interface WeatherInterface extends ExtensibleDataInterface
{

    const ENTITY_ID = 'entity_id';
    const VALUE = 'value';
    const LOCATION = 'location';
    const CREATED_AT = 'create_at';

    /**
     * @param int $entityId
     * @return $this
     */
    public function setEntityId(int $entityId);

    /**
     * @return int
     */
    public function getEntityId();

    /**
     * @param int $value
     * @return $this
     */
    public function setValue(int $value);

    /**
     * @return int
     */
    public function getValue();

    /**
     * @param string $location
     * @return $this
     */
    public function setLocation(string $location);

    /**
     * @return string
     */
    public function getLocation();

    /**
     * @param mixed $createdAt
     * @return mixed
     */
    public function setCreateAt($createdAt);

    /**
     * @return mixed
     */
    public function getCreatedAt();

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Monogo\Weather\Api\Data\WeatherExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Monogo\Weather\Api\Data\WeatherExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Monogo\Weather\Api\Data\WeatherExtensionInterface $extensionAttributes);

}
