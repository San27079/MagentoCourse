<?php
namespace StudyMage\Swapi\Controller\Adminhtml\Film;

class Edit extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'StudyMage_Swapi::edit';       
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
        return $this->resultPageFactory->create();  
    }    
}
