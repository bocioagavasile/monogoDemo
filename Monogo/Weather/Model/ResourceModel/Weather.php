<?php

namespace Monogo\Weather\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Weather extends AbstractDb
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('monogo_weather', 'entity_id');
    }

}
