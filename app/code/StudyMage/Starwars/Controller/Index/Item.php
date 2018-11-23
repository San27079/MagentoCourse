<?php

namespace StudyMage\Starwars\Controller\Index;

use \Magento\Framework\Registry;
use StudyMage\Starwars\Helper\SwapiHelper;

class Item extends \Magento\Framework\App\Action\Action
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
        $this->registry = $registry;
        $this->swapiHelper = $swapiHelper;

        parent::__construct($context);
    }

    public function execute()
    {
        $category = $this->getRequest()->getParam('category');
        $id = $this->getRequest()->getParam('id');
        if(empty($category) || empty($id)){
            $this->error();
        }
        $this->setSwapiItemData($category, $id);
        return $this->resultPageFactory->create();
    }


    public function setSwapiItemData($category, $id)
    {
        $swapi_data = $this->swapiHelper->getData($category, $id);
        if($swapi_data === 404){
            $this->error();
        }
        $this->registry->register('swapi_item_data', $swapi_data);
    }

    protected function error()
    {
        $this->_forward('index','error','starwars');
    }
}
