<?php

namespace Monogo\Weather\Controller\Adminhtml\Weather;

use Monogo\Weather\Api\WeatherRepositoryInterface;
use Monogo\Weather\Model\ResourceModel\Weather\CollectionFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Ui\Component\MassAction\Filter;

class MassDelete extends Action
{
    /**
     * Authorization level of a basic admin session
     */
    const ADMIN_RESOURCE = 'Monogo_Weather::weather';

    /**
     * Mass Action Filter
     *
     * @var Filter
     */
    protected $filter;

    /**
     * Collection Factory
     *
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var WeatherRepositoryInterface
     */
    protected $weatherRepository;

    /**
     * @param CollectionFactory $collectionFactory
     * @param WeatherRepositoryInterface $weatherRepository
     * @param Filter $filter
     * @param Context $context
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        WeatherRepositoryInterface $weatherRepository,
        Filter $filter,
        Context $context
    ) {
        $this->collectionFactory    = $collectionFactory;
        $this->weatherRepository = $weatherRepository;
        $this->filter               = $filter;
        parent::__construct($context);
    }

    /**
     * execute action
     *
     * @return Redirect
     * @throws LocalizedException
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());

        $deletedCount = 0;
        foreach ($collection as $item) {
            try {
                $this->weatherRepository->deleteById($item->getId());
                $deletedCount++;
            } catch (CouldNotDeleteException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            }
        }

        $this->messageManager->addSuccessMessage(__('A total of %1 item(s) have been deleted.', $deletedCount));
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/');
    }
}
