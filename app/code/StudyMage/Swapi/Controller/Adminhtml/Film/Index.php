<?php

namespace StudyMage\Swapi\Controller\Adminhtml\Film;

class Index extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'StudyMage_Swapi::swapi_film_list';

    protected $resultPageFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        echo('Hello');
        exit;
        //return $this->resultPageFactory->create();
    }
}
