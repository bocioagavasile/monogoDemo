<?php
namespace Monogo\Weather\Cron;

class Syncweather
{
    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
		$this->scopeConfig = $scopeConfig;
    }

    /**
     * @return void
     */
    public function execute()
    {


    }

}
