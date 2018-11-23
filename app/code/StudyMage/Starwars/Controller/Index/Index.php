<?php

namespace StudyMage\Starwars\Controller\Index;

use StudyMage\Starwars\Helper\SwapiHelper;
use \Magento\Framework\Registry;

class Index extends \Magento\Framework\App\Action\Action
{

    protected $resultPageFactory;
    protected $registry;
    protected $swapiHelper;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        Registry $registry,
        SwapiHelper $swapiHelper
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->swapiHelper = $swapiHelper;
        $this->registry = $registry;

        parent::__construct($context);
    }

    public function execute()
    {
        $request = $this->getRequest()->getParams();
        $this->setSwapiData();
        return $this->resultPageFactory->create();
    }


    protected function setSwapiData()
    {
       $swapi_data = $this->swapiHelper->getData();
       $this->registry->register('swapi_data', $swapi_data);
    }
}
