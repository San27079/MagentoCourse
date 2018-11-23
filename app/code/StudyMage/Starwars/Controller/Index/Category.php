<?php

namespace StudyMage\Starwars\Controller\Index;

use \Magento\Framework\Registry;
use StudyMage\Starwars\Helper\SwapiHelper;

class Category extends \Magento\Framework\App\Action\Action
{

    protected $resultPageFactory;
    protected $swapiHelper;
    protected $registry;

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
        $category = $this->getRequest()->getParam('category');
        if(empty($category)){
            $this->error();
        }
        $this->setSwapiCategoryData($category);

        return $this->resultPageFactory->create();
    }

    protected function setSwapiCategoryData($category)
    {
        $swapi_data = $this->swapiHelper->getData($category);
        if($swapi_data === 404){
            $this->error();
        }
        $this->registry->register('swapi_category_data', $swapi_data);
    }

    protected function error()
    {
        $this->_redirect('*/error/');
    }
}
