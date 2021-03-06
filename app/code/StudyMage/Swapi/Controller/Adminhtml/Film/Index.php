<?php

namespace StudyMage\Swapi\Controller\Adminhtml\Film;

class Index extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'StudyMage_Swapi::film';

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
        $page = $this->resultPageFactory->create();
        $page->getConfig()->getTitle()->prepend((__('Films')));
        return $page;
    }
}
